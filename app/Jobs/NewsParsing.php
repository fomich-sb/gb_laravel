<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\Contracts\Parser;
use App\Services\NewsService;
use App\Models\Source;

class NewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Source $source;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Source $source)
    {
        $this->source = $source;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Parser $parser, NewsService $newsService)
    {
        $results = [
            'newCnt' => 0,
            'updatedCnt' => 0,
            'errorCnt' => 0,
        ];
        $load = $parser->setLink($this->source->url)
            ->getParseData();
        $newsService->updateNewsFromRssData($load, $this->source, $results);
        echo ' ОБРАБОТАНО ' . $this->source->url . '. Новых новостей ' . $results['newCnt'] . '. Обновлено новостей ' . $results['updatedCnt'] . '. Ошибок новостей ' . $results['errorCnt'];
    }
}
