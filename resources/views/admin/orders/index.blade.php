@extends('layouts.admin')

@section('title', 'Админка заявок')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h3>Заявки на выгрузку</h3>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('admin.orders.create') }}">Добавить заявку</a>
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
                <th>Телефон</th>
                <th>Описание</th>
                <th>Статус</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ordersList as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->username }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->orderinfo }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->created_at }}</td>
                <td><a href="{{ route('admin.orders.edit', ['order' => $order]) }}">Изм.</a> &nbsp; <a href="javascript:;" class="delete" rel={{ $order->id }} style="color: red">Уд.</a></td>
            </tr>
                
            @empty
            <tr>
                <td colspan="7">Сообщений нет</td>
            </tr>
                
            @endforelse
        </tbody>
    </table>

    {{ $ordersList->links() }}
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
                    send(`/admin/orders/${id}`).then(() => {
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
