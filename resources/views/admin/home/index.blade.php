@extends('layouts.admin')


@section('title', 'Админка Главной страницы')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h3>Главная страница</h3>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.home.create') }}">Добавить раздел</a>
    </div>    
</div>

<br>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Раздел</th>
                <th>Резюме</th>
                <th>Отображение</th>
                <th>Статус</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($homesList as $home)
            <tr>
                <td>{{ $home->id }}</td>
                <td>{{ $home->title }}</td>
                <td>{{ $home->resume }}</td>
                {{-- <td>{{ $home->is_visible }}</td> --}}
                @if ($home->is_visible == true)
                <td> Visible </td>
                @else <td> No </td>  
                @endif
                <td>{{ $home->status }}</td>
                <td>{{ $home->created_at }}</td>
                <td><a href="{{ route('admin.home.edit', ['home' => $home]) }}">Изм.</a> &nbsp; <a href="#" style="color: red">Уд.</a></td>
            </tr>
                
            @empty
            <tr>
                <td colspan="7">Разделов нет</td>
            </tr>
                
            @endforelse
        </tbody>
    </table>

    {{ $homesList->links() }}
</div>
    
@endsection