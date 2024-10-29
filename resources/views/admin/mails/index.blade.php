@extends('layouts.admin')

@section('title', 'Админка сообщений')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h3>Сообщения пользователей</h3>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.mails.create') }}">Добавить сообщение</a>
    </div>    
</div>

<br>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Имя</th>
                <th>E-mail</th>
                <th>Сообщение</th>
                <th>Статус</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mailsList as $mail)
            <tr>
                <td>{{ $mail->id }}</td>
                <td>{{ $mail->username }}</td>
                <td>{{ $mail->email }}</td>
                <td>{{ $mail->description }}</td>
                <td>{{ $mail->status }}</td>
                <td>{{ $mail->created_at }}</td>
                <td><a href="{{ route('admin.mails.edit', ['mail' => $mail]) }}">Изм.</a> &nbsp; <a href="jabascript:;" class="delete" rel={{ $mail->id }} style="color: red">Уд.</a></td>
            </tr>
                
            @empty
            <tr>
                <td colspan="7">Сообщений нет</td>
            </tr>
                
            @endforelse
        </tbody>
    </table>

    {{ $mailsList->links() }}
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
                    send(`/admin/mails/${id}`).then(() => {
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

