<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Source;
use App\Services\Contracts\Parser;
use App\Services\NewsService;
use Illuminate\Http\Request;
use App\Jobs\NewsParsing;

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
        $sources = App(Source::class)->all();
        foreach($sources as $source)
        {
            \dispatch(new NewsParsing($source));
        }

        return view('admin.parser.index');
    }
}