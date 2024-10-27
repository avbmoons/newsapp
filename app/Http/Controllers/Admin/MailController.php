<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\MailStatus;
use App\Http\Controllers\Controller;
use App\Models\Mail;
use App\QueryBuilders\MailsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MailsQueryBuilder $mailsQueryBuilder): View
    {
        $mailsList = $mailsQueryBuilder->getMailsWithPaginathion();

        return view('admin.mails.index', [
            'mailsList' => $mailsList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $statuses = MailStatus::all();

        return view('admin.mails.create', [
            'statuses' => $statuses,
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
        $mail = new Mail($request->except('_token'));

        if ($mail->save()) {
            return redirect()->route('admin.mails.index')->with('success', 'Сообщение успешно добавлено');
        }

        return \back()->with('error', 'Не удалось сохранить сообщение');
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
    public function edit(Mail $mail): View
    {
        $statuses = MailStatus::all();

        return view('admin.mails.edit', [
            'mail' => $mail,
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
    public function update(Request $request, Mail $mail): RedirectResponse
    {
        $mail = $mail->fill($request->except('_token'));

        if ($mail->save()) {
            return redirect()->route('admin.mails.index')->with('success', 'Изменения успешно внесены');
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
