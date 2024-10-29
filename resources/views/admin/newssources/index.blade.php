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
                <td><a href="{{ route('admin.newssources.edit', ['newssource' => $newssource]) }}">Изм.</a> &nbsp; <a href="javascript:;" class="delete" rel={{ $newssource->id }} style="color: red">Уд.</a></td>
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

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                const id = this.getAttribute('rel');
                if(confirm(`Подтверждаете удаление записи с #ID = ${id}`)) {
                    send(`/admin/newssources/${id}`).then(() => {
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