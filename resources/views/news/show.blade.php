@extends('layouts.main')

@section('title', 'Ваша новость')


    <div>
        {{-- <h2>Новость № {{ $news['id'] }}</h2> --}}
        <h2>Новость № {{ $news->id }}</h2>

        {{-- <div style="border: 1px solid green">
            <h3>{{ $news['category_id'] }}</h3>
            <h2>{{ $news['title'] }}</h2>
            <p>{{ $news['description'] }}</p>
            <div><strong>{{ $news['author'] }} ({{ $news['created_at'] }})</strong>
            <a href="{{ route('news') }}">Назад к списку...</a>
        </div> --}}

    </div>

@section('content')

  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        {{ $news->category_title }}
      </h3>
      {{-- <a href="{{ route('news') }}" class="stretched-link">Назад к списку...</a> --}}
      <a href="{{ url()->previous() }}" class="stretched-link">Назад к списку...</a>
      
      <hr>

      <div class="blog-post">
        <h2 class="blog-post-title">{{ $news->title }}</h2>
        <p class="blog-post-meta">{{ $news->created_at }} by <a href="#">{{ $news->author }}</a></p>

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

  {{-- <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        {{ $news['category_title'] }}
      </h3>

      <a href="{{ url()->previous() }}" class="stretched-link">Назад к списку...</a>
      
      <hr>

      <div class="blog-post">
        <h2 class="blog-post-title">{{ $news['title'] }}</h2>
        <p class="blog-post-meta">{{ $news['created_at'] }} by <a href="#">{{ $news['author'] }}</a></p>

        {{ $news['description'] }}

      </div>

    </div>

    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">Saw you downtown singing the Blues. Watch you circle the drain. Why don't you let me stop by? Heavy is the head that <em>wears the crown</em>. Yes, we make angels cry, raining down on earth from up above.</p>
      </div>

    </aside>

  </div> --}}
    
@endsection    
    