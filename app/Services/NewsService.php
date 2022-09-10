<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\News as ModelsNews;
use App\Models\Source;
use App\Services\Contracts\News;

class NewsService implements News
{
    public function updateNewsFromRssData(array $data, Source $source, array &$results)
    {
        foreach($data['news'] as $item)
        {
            $dateArray = date_parse($data['news'][0]['pubDate']);
            $pubDate = date('Y-m-d H:i:s', mktime($dateArray['hour'], $dateArray['minute'], $dateArray['second'], $dateArray['month'], $dateArray['day'], $dateArray['year']));
            
            $params = array_merge($item, [
                "category_id" => $source->category_id, 
                "source_id" => $source->id,
                "pub_date" => $pubDate,
                "status" => ModelsNews::ACTIVE,

            ]);

            $news = App(ModelsNews::class)->where('category_id', $source->category_id)->where('guid', $item['guid'])->first();
            if($news == null)
            {
                $news = App(ModelsNews::class)->create($params);
                if($news)
                    $results['newCnt']++;
                else
                    $results['errorCnt']++;
            }
            else
            {
                if($news->update($params))
                    $results['updatedCnt']++;
                else
                    $results['errorCnt']++;
            }
        }
        return;
    }
}