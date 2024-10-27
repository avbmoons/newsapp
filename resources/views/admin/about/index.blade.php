@extends('layouts.admin')


@section('title', 'Админка О проекте')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h3>Страница "О проекте"</h3>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.about.create') }}">Добавить раздел</a>
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
            @forelse ($aboutsList as $about)
            <tr>
                <td>{{ $about->id }}</td>
                <td>{{ $about->title }}</td>
                <td>{{ $about->resume }}</td>
                {{-- <td>{{ $about->is_visible }}</td>--}} 
                @if ($about->is_visible == true)
                <td> Visible </td>
                @else <td> No </td>  
                @endif
                <td>{{ $about->status }}</td>
                <td>{{ $about->created_at }}</td>
                <td><a href="{{ route('admin.about.edit', ['about' => $about]) }}">Изм.</a> &nbsp; <a href="#" style="color: red">Уд.</a></td>
            </tr>
                
            @empty
            <tr>
                <td colspan="7">Разделов нет</td>
            </tr>
                
            @endforelse
        </tbody>
    </table>

    {{ $aboutsList->links() }}
</div>
    
@endsection