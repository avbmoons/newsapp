<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\NewsTrait;
use App\Models\News;
use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    //use NewsTrait;
    //use News;

    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
         //$news = News::getNews();
         $newsList = $newsQueryBuilder->getNewsWithPaginathion();

        //return \view('news.index')->with('news', $news);
        return \view('news.index', ['newsList' => $newsList]);
    }

    public function show(int $id, News $news): View
    {
        //$news = News::getNewsId($id);

        return \view('news.show')->with('news', $news->getNewsById($id));
        //return \view('news.show', [$id])->with('news', $news->getNewsById($id));
        //return \view('news.show', ['news' => $this->getNews($id)]);
    }

    // public function index()
    // {
    //     // dd($this->getNews());
    //     // return $this->getNews();
    //     return \view('news.index', [
    //         'news'=>$this->getNews(),
    //     ]);
    // }

    // public function show($id)
    // {
    //     return $this->getNews($id);
    // }
}
