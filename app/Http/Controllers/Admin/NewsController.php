<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\News;
use App\Models\NewsSource;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\NewsSourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder, NewsSourcesQueryBuilder $newsSourcesQueryBuilder, NewsQueryBuilder $newsQueryBuilder): View
    {
        // $model = new News();
        // $newsList = $model->getNews();
        //$newsList = $newsQueryBuilder->getAll();
        $newsList = $newsQueryBuilder->getNewsWithPaginathion();
        // $join = DB::table('news')
        //     ->join('category_has_news', 'news_id', '=', 'category_has_news.news_id')
        //     ->leftJoin('categories', 'category_has_news.category_id', '=', 'categories.id')
        //     ->select('news.*', 'category_has_news.category_id', 'categories.title')
        //     //->toSql();
        //      ->get();
        // //dd($newsList);
        // dd($join);

        return view('admin.news.index', [
            'categories' => $categoriesQueryBuilder->getAll(),
            'newsSources' => $newsSourcesQueryBuilder->getAll(),
            'newsList' => $newsList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder, NewsSourcesQueryBuilder $newsSourcesQueryBuilder): View
    {
        $statuses = NewsStatus::all();

        return view('admin.news.create', [
            'categories' => $categoriesQueryBuilder->getAll(),
            'newsSources' => $newsSourcesQueryBuilder->getAll(),
            'statuses' => $statuses,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request): RedirectResponse    
    {
        $news = News::create($request->validated());

        if ($news->save()) {

            $news->categories()->attach($request->getCategoryIds());

            return redirect()->route('admin.news.index')->with('success', 'Новость успешно добавлена');
        }

        //return response()->json($request->only(['title', 'author', 'description']))
        return \back()->with('error', 'Не удалось сохранить новость');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news, CategoriesQueryBuilder $categoriesQueryBuilder, NewsSourcesQueryBuilder $newsSourcesQueryBuilder): View
    {
        $statuses = NewsStatus::all();

        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categoriesQueryBuilder->getAll(),
            'newsSources' => $newsSourcesQueryBuilder->getAll(),
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->validated());

        //$news = $news->fill($request->except('_token', 'category_ids'));

        if ($news->save()) {
            $news->categories()->sync($request->getCategoryIds());

            return redirect()->route('admin.news.index')->with('success', 'Изменения успешно внесены');
        }

        return \back()->with('error', 'Не удалось внести изменения');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news): JsonResponse
    {
        try {
            $news->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            //\Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
