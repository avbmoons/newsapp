<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\SectionStatus;
use App\Enums\SectionVisible;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\QueryBuilders\AboutsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AboutsQueryBuilder $aboutsQueryBuilder): View
    {
        $aboutsList = $aboutsQueryBuilder->getAboutsWithPaginathion();
        return view('admin.about.index', [
            'aboutsList' => $aboutsList,
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

        return view('admin.about.create', [
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
    public function store(Request $request): RedirectResponse
    {
        $about = new About($request->except('_token'));

        if ($about->save()) {
            return redirect()->route('admin.about.index')->with('success', 'Раздел успешно добавлен');
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
    public function edit(About $about): View
    {
        $statuses = SectionStatus::all();
        $sectionVisibles = SectionVisible::all();

        return \view('admin.about.edit', [
            'about' => $about,
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
    public function update(Request $request, About $about): RedirectResponse
    {
        $about = $about->fill($request->except('_token'));

        if ($about->save()) {
            return redirect()->route('admin.about.index')->with('success', 'Изменения успешно внесены');
        }

        return \back()->with('error', 'Не удалось внести изменения');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
