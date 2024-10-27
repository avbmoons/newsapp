<div>
    <h3>Отправить сообщение</h3>
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
            <label for="email">Ваш e-mail</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email')}}">
        </div>
        <div class="form-group">
            <label for="description">Ваш комментарий</label>
            <textarea class="form-control" name="description" id="description" >{{ old('description')}}</textarea>
        </div>

        <br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
</div>