<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\CategoryStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateRequest;
use App\Http\Requests\Categories\EditRequest;
use App\Models\Category;
use App\QueryBuilders\CategoriesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        $model = new Category();
        //$categoriesList = $model->getCategories();
        $categoriesList = $categoriesQueryBuilder->getCategoriesWithPaginathion();

        return view('admin.categories.index', [
            'categoriesList' => $categoriesList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $statuses = CategoryStatus::all();

        return view('admin.categories.create', [
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
        //$category = new Category($request->except('_token'));
        $category = Category::create($request->validated());

        if ($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Категория успешно добавлена');
        }

        return \back()->with('error', 'Не удалось сохранить категорию');
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
    public function edit(Category $category): View
    {
        $statuses = CategoryStatus::all();

        return view('admin.categories.edit', [
            'category' => $category,
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
    public function update(EditRequest $request, Category $category): RedirectResponse
    {
        $category = $category->fill($request->validated());
        //$category = $category->fill($request->except('_token'));

        if ($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Изменения успешно внесены');
        }

        return \back()->with('error', 'Не удалось внести изменения');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category): JsonResponse
    {
        try {
            $category->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            //\Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
