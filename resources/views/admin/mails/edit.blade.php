@extends('layouts.admin')

@section('title', 'Редактировать сообщение')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать сообщение</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
</div>
<div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>        
        @endforeach        
    @endif
  
    <form method="post" action="{{ route('admin.mails.update', ['mail'=>$mail]) }}">
        @csrf  
        @method('put')    
        <div class="form-group">
            <label for="username">Ваше имя</label>
            <input type="text" id="username" name="username" class="form-control" value="{{ $mail->username }}">
        </div>
        <div class="form-group">
            <label for="email">Ваш e-mail</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $mail->email }}">
        </div>
        <div class="form-group">
            <label for="description">Ваш комментарий</label>
            <textarea class="form-control" name="description" id="description" >{{ $mail->description }}</textarea>
        </div>
  
        <div class="form-group">
          <label for="status">Статус</label>
          <select class="form-control" name="status" id="status">
            @foreach ($statuses as $status)
            <option @if($mail->status === $status) selected @endif>{{ $status }}</option>
                
            @endforeach
          </select>
        </div>
  
        <br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
  </div>
    
@endsection