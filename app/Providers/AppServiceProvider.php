<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Queries\NewsQueryBuilder;
use App\Services\Contracts\News;
use App\Services\Contracts\Parser;
use App\Services\Contracts\Social;
use App\Services\NewsService;
use App\Services\ParserService;
use App\Services\SocialService;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NewsQueryBuilder::class);
        
        //Services
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(News::class, NewsService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
