<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\NewsTrait;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\NewsSourcesQueryBuilder;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    //use NewsTrait;
    //use News;

    public function index(NewsQueryBuilder $newsQueryBuilder, CategoriesQueryBuilder $categoriesQueryBuilder, NewsSourcesQueryBuilder $newsSourcesQueryBuilder): View
    {
         $newsList = $newsQueryBuilder->getNewsWithPaginathion();

        return \view('news.index', [
            'categories' => $categoriesQueryBuilder->getAll(),
            'newsSources' => $newsSourcesQueryBuilder->getAll(),
            'newsList' => $newsList,
        ]);
    }

    public function show(int $id, News $news, CategoriesQueryBuilder $categoriesQueryBuilder, NewsSourcesQueryBuilder $newsSourcesQueryBuilder): View
    {
        $news = News::findOrFail($id);

        return \view('news.show', [
            'news' => $news,
            'categories' => $categoriesQueryBuilder->getAll(),
            'newsSources' => $newsSourcesQueryBuilder->getAll(),
        ]);
    }

}
