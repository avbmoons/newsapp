@extends('layouts.admin')

@section('title') Добавить категорию @parent @stop

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить категорию</h1>
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
  {{-- @if (session('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div> --}}
      
  @endif
  @if ($errors->any())
  @foreach ($errors->all() as $error)
  {{--{{ $error }}--}}
   <x-alert type="danger" :message="$error"></x-alert> 
      
  @endforeach
  @endif
    <form method="post" action="{{route('admin.categories.store')}}">
        @csrf
        {{-- <div class="form-group">
          <label for="category_id">Категория</label>
          <select class="form-control" name="category_id" id="category_id">
            <option value="0">--Выбрать--</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if((int) old('category_id') === $category->id) selected @endif>{{ $category->title }}</option>
                
            @endforeach
          </select>
        </div> --}}
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="slug">Псевдоним</label>
            <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea id="description" name="description" class="form-control">{{old('description')}}</textarea>
        </div>
         <div class="form-group">
          <label for="image">Изображение</label>
          <input type="file" id="image" name="image" class="form-control">
        </div> 
        {{--<div class="form-group">
            <label for="is_visible">Отображение на странице</label>
            <input type="checkbox" id="is_visible" name="is_visible" class="form-control"  >
          </div>
          <div class="form-group">
            <label for="is_visible">Отображение на странице</label>
            <select class="form-control" name="is_visible" id="is_visible">
              @foreach ($sectionVisibles as $sectionVisible)
              <option @if(old('is_visible') === $sectionVisible) selected @endif>{{ $sectionVisible }}</option>                  
              @endforeach
            </select>
          </div>--}}
        <div class="form-group">
          <label for="status">Статус</label>
          <select class="form-control" name="status" id="status">
            @foreach ($statuses as $status)
            <option @if(old('status') === $status) selected @endif>{{ $status }}</option>
                
            @endforeach
          </select>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
    
@endsection