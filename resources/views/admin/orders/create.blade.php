@extends('layouts.main')

@section('title', 'Добавить заявку')

@section('content')
{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить заявку</h1>
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

<x-order></x-order> --}}
<div>
  <h3>Заказать выгрузку данных</h3>
  <a href="{{ url()->previous() }}" >Назад ...</a>
  <br>
  <hr>
  @if ($errors->any())
      @foreach ($errors->all() as $error)
      <x-alert type="danger" :message="$error"></x-alert>        
      @endforeach        
  @endif

  <form method="post" action="{{ route('admin.orders.store') }}">
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
          <label for="phone">Ваш телефон</label>
          <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone')}}">
      </div>        
      <div class="form-group">
          <label for="orderinfo">Что выгрузить?</label>
          <textarea class="form-control" name="orderinfo" id="orderinfo" >{{ old('orderinfo')}}</textarea>
      </div>
      <div class="form-group">
        <label for="status">Статус</label>
        <select class="form-control" name="status" id="status">
          @foreach ($statuses as $status)
          <option @if(old('status') === $status) selected @endif>{{ $status }}</option>
              
          @endforeach
        </select>
      </div>

      <br>
      <button type="submit" class="btn btn-success">Отправить</button>
  </form>
</div>


    
@endsection

