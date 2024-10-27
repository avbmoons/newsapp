@extends('layouts.admin')

@section('title') Редактировать новость @parent @stop

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать новость</h1>
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
    <form method="post" action="{{route('admin.news.update', ['news'=> $news])}}">        
        @csrf
        @method('put')
        <div class="form-group">
          <label for="category_ids">Категория</label>
          <select class="form-control" name="category_ids[]" id="category_ids" multiple>
            <option value="0">--Выбрать--</option>
            @foreach ($categories as $category)
            <option @if(in_array($category->id, $news->categories->pluck('id')->toArray())) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                
            @endforeach
          </select>
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $news->title }}">
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" id="author" name="author" class="form-control" value="{{ $news->author }}">
        </div>
        <div class="form-group">
            <label for="author">Описание</label>
            <textarea id="description" name="description" class="form-control">{!!$news->description!!}</textarea>
        </div>
        <div class="form-group">
          <label for="image">Изображение</label>
          <input type="file" id="image" name="image" class="form-control">
      </div>
      <div class="form-group">
        <label for="source_id">Источник</label>
        <select class="form-control" name="source_id" id="source_id" >
          <option value="0">--Выбрать--</option>
          @foreach ($newsSources as $newsSource)
           {{-- <option @if($newsSource->id) selected @endif value="{{ $newsSource->id }}">{{ $newsSource->title }}</option>  --}}
           <option @if($newsSource->id == $news->source_id) selected @endif value="{{ $newsSource->id }}">{{ $newsSource->title }}<option>
          {{--  <option @if(in_array($newsSource->id, $news->newsSource->source_id->toArray())) selected @endif value="{{ $newsSource->id }}">{{ $newsSource->title }}<option>--}}
              
          @endforeach
        </select>
      </div>
        <div class="form-group">
          <label for="status">Статус</label>
          <select class="form-control" name="status" id="status">
            @foreach ($statuses as $status)
            <option @if($news->status === $status) selected @endif>{{ $status }}</option>
                
            @endforeach
          </select>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
    
@endsection