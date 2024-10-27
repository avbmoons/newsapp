@extends('layouts.admin')


@section('title', 'Админка источников')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h3>Источники новостей</h3>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.newssources.create') }}">Добавить источник</a>
    </div>    
</div>
<br>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Ссылка</th>
                <th>Статус</th>                
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($newsSourcesList as $newssource)
            <tr>
                <td>{{ $newssource->id }}</td>
                <td>{{ $newssource->title }}</td>
                <td>{{ $newssource->description }}</td>
                <td>{{ $newssource->url }}</td>
                <td>{{ $newssource->status }}</td>                
                <td>{{ $newssource->created_at }}</td>
                <td><a href="{{ route('admin.newssources.edit', ['newssource' => $newssource]) }}">Изм.</a> &nbsp; <a href="#" style="color: red">Уд.</a></td>
            </tr>
                
            @empty
            <tr>
                <td colspan="7">Новостей нет</td>
            </tr>
                
            @endforelse
        </tbody>
    </table>

    {{ $newsSourcesList->links() }}
</div>
    
@endsection