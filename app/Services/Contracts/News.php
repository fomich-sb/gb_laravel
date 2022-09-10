<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use App\Models\Source;

interface News
{

    public function updateNewsFromRssData(array $data, Source $source, array &$results);

}