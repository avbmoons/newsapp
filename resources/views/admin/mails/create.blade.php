@extends('layouts.admin')

@section('title') Добавить сообщение @parent @stop

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить сообщение</h1>
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

<x-mail></x-mail>

<div class="form-group">
  <label for="status">Статус</label>
  <select class="form-control" name="status" id="status">
    @foreach ($statuses as $status)
    <option @if(old('status') === $status) selected @endif>{{ $status }}</option>
        
    @endforeach
  </select>
</div>
    
@endsection


Создать сообщение