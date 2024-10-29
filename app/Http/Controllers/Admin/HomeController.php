<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\SectionStatus;
use App\Enums\SectionVisible;
use App\Http\Controllers\Controller;
use App\Http\Requests\Home\CreateRequest;
use App\Http\Requests\Home\EditRequest;
use App\Models\Home;
use App\QueryBuilders\HomesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HomesQueryBuilder $homesQueryBuilder): View
    {
        $homesList = $homesQueryBuilder->getHomesWithPaginathion();
        return view('admin.home.index', [
            'homesList' => $homesList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $statuses = SectionStatus::all();
        $sectionVisibles = SectionVisible::all();

        return view('admin.home.create', [
            'statuses' => $statuses,
            'sectionVisibles' => $sectionVisibles,
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
        //$home = new Home($request->except('_token'));
        $home = Home::create($request->validated());

        if ($home->save()) {
            return redirect()->route('admin.home.index')->with('success', 'Раздел успешно добавлен');
        }

        return \back()->with('error', 'Не удалось сохранить раздел');
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
    public function edit(Home $home): View
    {
        $statuses = SectionStatus::all();
        $sectionVisibles = SectionVisible::all();

        return view('admin.home.edit', [
            'home' => $home,
            'statuses' => $statuses,
            'sectionVisibles' => $sectionVisibles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Home $home): RedirectResponse
    {
        //$home = $home->fill($request->except('_token'));
        $home = $home->fill($request->validated());

        if ($home->save()) {
            return redirect()->route('admin.home.index')->with('success', 'Изменения успешно внесены');
        }

        return \back()->with('error', 'Не удалось внести изменения');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home): JsonResponse
    {
        try {
            $home->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            //\Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
