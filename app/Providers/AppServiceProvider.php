<?php

declare (strict_types=1);

namespace App\Providers;

use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsSourcesQueryBuilder;
use App\QueryBuilders\MailsQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\OrdersQueryBuilder;
use App\QueryBuilders\AboutsQueryBuilder;
use App\QueryBuilders\HomesQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::class, NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, CategoriesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsSourcesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, MailsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, OrdersQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, AboutsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, HomesQueryBuilder::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
    }
}
