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
                <strong class="d-inline-block mb-2 text-success">{{ $news->categories->map(fn($item)=> $item->title)->implode(", ") }}</strong>
                <h3 class="mb-0">{{ $news->title }}</h3>
                <div class="mb-1 text-muted">{{ $news->created_at }} by {{ $news->author }}</div>
                <p class="mb-auto">{{ $news->description }}</p>
                <a href="{{ route('newsId', ['id' => $news->id]) }}" class="stretched-link">Читать далее...</a>
              </div>
              <div class="col-auto d-none d-lg-block">
                <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
      
              </div>
            </div>
          </div>

          @empty
              <h2>Новостей нет</h2> 
                  
      @endforelse

      {{ $newsList->links() }}
    </div>
    
   
    @endsection
