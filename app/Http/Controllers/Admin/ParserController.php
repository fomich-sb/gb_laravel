<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Source;
use App\Services\Contracts\Parser;
use App\Services\NewsService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser, NewsService $newsService)
    {
        $results = [
            'newCnt' => 0,
            'updatedCnt' => 0,
            'errorCnt' => 0,
        ];

        $sources = App(Source::class)->all();
        foreach($sources as $source)
        {
            $load = $parser->setLink($source->url)
                ->getParseData();
            $newsService->updateNewsFromRssData($load, $source, $results);
        }

        return view('admin.parser.index', [
            'results' => $results,
        ]);
    }
}