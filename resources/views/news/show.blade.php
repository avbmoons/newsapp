@extends('layouts.main')

@section('title', 'Ваша новость')

@section('content')

<div>
  <h2>Новость № {{ $news->id }}</h2>
</div>

  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        {{ $news->categories->map(fn($item)=> $item->title)->implode(", ") }}
        {{-- {{ $news->category_title }} 
        {{ $categories->title }}--}}
      </h3>
      <a href="{{ url()->previous() }}" class="stretched-link">Назад к списку...</a>
      
      <hr>

      <div class="blog-post">
        <h2 class="blog-post-title">{{ $news->title }}</h2>
        <p class="blog-post-meta">{{ $news->created_at }} by <a href="#">{{ $news->author }}</a></p>
        <p class="blog-post-meta">sourced by @foreach ($newsSources as $newsSource) @if($news->source_id === $newsSource->id) <a href="#">{{ $newsSource->title }}</a> @endif @endforeach</p>
        {{-- @foreach ($newsSources as $newsSource)
          <p class="blog-post-meta">sourced by @if($news->source_id === $newsSource->id) <a href="#">{{ $newsSource->title }}</a> @endif</p>    
        @endforeach 
        @dd($newsSources);
        <p class="blog-post-meta">sourced by @if($newsSources->newsSources->id == $news->source_id) <a href="#">{{ $newsSources->title }}</a> @endif</p>--}}
        

        {{ $news->description }}

      </div><!-- /.blog-post -->

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">Saw you downtown singing the Blues. Watch you circle the drain. Why don't you let me stop by? Heavy is the head that <em>wears the crown</em>. Yes, we make angels cry, raining down on earth from up above.</p>
      </div>

    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

    
@endsection    
    