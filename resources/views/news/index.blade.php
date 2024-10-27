@extends('layouts.main')

@section('title', 'Все новости')

    <div>
        <h2>Новости</h2>
    </div>

    @section('content')    
    <div class="row mb-2">
      @forelse ($newsList as $news)

          <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-success">{{ $news->category_title }}</strong>
                <h3 class="mb-0">{{ $news->title }}</h3>
                <div class="mb-1 text-muted">{{ $news->created_at }} by {{ $news->author }}</div>
                <p class="mb-auto">{{ $news['description'] }}</p>
                <a href="{{ route('newsId', ['id' => $news->id]) }}" class="stretched-link">Читать далее...</a>
              </div>
              <div class="col-auto d-none d-lg-block">
                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
      
              </div>
            </div>
          </div>


          {{-- <div style="border: 1px solid green">
              <h3>{{ $item['category_id'] }}</h3>
              <h2>{{ $item['title'] }}</h2>
              <p>{{ $item['description'] }}</p>
              <div><strong>{{ $item['author'] }} ({{ $item['created_at'] }})</strong>
                  <a href="{{ route('newsId', ['id' => $item['id']]) }}">Подробнее...</a>
              </div>
          </div> --}}

          @empty
              <h2>Новостей нет</h2> 
                  
      @endforelse
    </div>
    
    {{-- <div class="row mb-2">
      @forelse ($news as $item)

          <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-success">{{ $item['category_title'] }}</strong>
                <h3 class="mb-0">{{ $item['title'] }}</h3>
                <div class="mb-1 text-muted">{{ $item['created_at'] }} by {{ $item['author'] }}</div>
                <p class="mb-auto">{{ $item['description'] }}</p>
                <a href="{{ route('newsId', ['id' => $item['id']]) }}" class="stretched-link">Читать далее...</a>
              </div>
              <div class="col-auto d-none d-lg-block">
                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
      
              </div>
            </div>
          </div>
          @empty
              <h2>Новостей нет</h2> 
                  
      @endforelse
    </div>  --}}
    
    @endsection
