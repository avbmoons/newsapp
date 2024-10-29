@extends('layouts.admin')


@section('title', 'Админка категорий новостей')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h3>Категории новостей</h3>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.categories.create') }}">Добавить категорию</a>
    </div>    
</div>

<br>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Заголовок</th>
                <th>Псевдоним</th>
                <th>Описание</th>
                <th>Статус</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categoriesList as $categories)
            <tr>
                <td>{{ $categories->id }}</td>
                <td>{{ $categories->title }}</td>
                <td>{{ $categories->slug }}</td>
                <td>{{ $categories->description }}</td>
                <td>{{ $categories->status }}</td>
                <td>{{ $categories->created_at }}</td>
                <td><a href="{{ route('admin.categories.edit', ['category' => $categories]) }}">Изм.</a> &nbsp; <a href="javascript:;" class="delete" rel={{ $categories->id }} style="color: red">Уд.</a></td>
            </tr>
                
            @empty
            <tr>
                <td colspan="7">Новостей нет</td>
            </tr>
                
            @endforelse
        </tbody>
    </table>

    {{ $categoriesList->links() }}
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
                    send(`/admin/categories/${id}`).then(() => {
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