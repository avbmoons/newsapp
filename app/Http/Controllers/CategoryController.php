<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\NewsSourcesQueryBuilder;
use Illuminate\Contracts\View\View;

//use App\Http\Controllers\CategoryTrait;
//use App\Http\Controllers\NewsTrait;

class CategoryController extends Controller
{
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        $categoriesList = $categoriesQueryBuilder->getCategoriesWithPaginathion();

        return \view('category.index', [
            'categoriesList' => $categoriesList
        ]);
    }

    public function show(News $news, Category $category, NewsQueryBuilder $newsQueryBuilder, $slug)
    {
        $newsList = Category::where('slug', $slug)->first()->news;
        // $category = Category::with('slug')->get();
        $categoryTitle = Category::where('slug', $slug)->pluck('title');

        return \view('category.show', [
            'newsList' => $newsList,
            'news' => $news,
            'category' => $category,
            'categoryTitle' => $categoryTitle,
        ]);
        // ->with('newsList', $newsList)
        // ->with('news', $news)
        // ->with('category', $category);
    }

}
