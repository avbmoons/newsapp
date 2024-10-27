<div>
    <h3>Заказать выгрузку данных</h3>
    <br>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
        @endforeach        
    @endif

    <form method="POST" action="#">
        @csrf
        <div class="form-group">
            <label for="username">Ваше имя</label>
            <input type="text" id="username" name="username" class="form-control" value="{{ old('username')}}">
        </div>
        <div class="form-group">
            <label for="usermail">Ваш e-mail</label>
            <input type="text" id="usermail" name="usermail" class="form-control" value="{{ old('usermail')}}">
        </div>
        <div class="form-group">
            <label for="userphone">Ваш телефон</label>
            <input type="text" id="userphone" name="userphone" class="form-control" value="{{ old('userphone')}}">
        </div>        
        <div class="form-group">
            <label for="orderinfo">Что выгрузить?</label>
            <textarea class="form-control" name="orderinfo" id="orderinfo" >{{ old('orderinfo')}}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
</div>