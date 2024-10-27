@extends('layouts.admin')


@section('title', 'Админка новостей')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h3>Новости</h3>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.news.create') }}">Добавить новость</a>
    </div>    
</div>

<br>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Категория</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Статус</th>
                <th>Автор</th>
                <th>Источник</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($newsList as $news)
            <tr>
                <td>{{ $news->id }}</td>
                <td>{{ $news->categories->map(fn($item)=> $item->title)->implode(", ") }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->description }}</td>
                <td>{{ $news->status }}</td>
                <td>{{ $news->author }}</td>
                {{--@if ($news->source_id == $news->newsSources->id)
                    <td>{{$news->newsSources->title}}</td>
                @endif
                <td>{{ $news->source_id }}</td> --}} 
                <td>{{ $news->newsSource->title }}</td>
                {{--<td>{{ $news->newsSources->title }}</td> 
                 <td>{{ $news->newsSources->map(fn($source)=> $source->title)->implode(" ") }}</td>--}}
                <td>{{ $news->created_at }}</td>
                <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}">Изм.</a> &nbsp; <a href="javascript:;" class="delete" rel="{{ $news->id }}" style="color: red">Уд.</a></td>
            </tr>
                
            @empty
            <tr>
                <td colspan="7">Новостей нет</td>
            </tr>
                
            @endforelse
        </tbody>
    </table>

    {{ $newsList->links() }}
</div>
    
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                const id = this.getAttribute('rel');
                if(confirm(`Подтверждаете удаление записи с #ID = ${id}`)) {
                    send(`/admin/news/${id}`).then(() => {
                        location.reload();
                    });
                } else {
                    alert("Удаление отменено");
                }
            });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush