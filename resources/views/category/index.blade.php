@extends('layouts.main')

@section('title', 'Категории новостей')

@section('content')    
    <div>
        <h2>Категории новостей</h2>
    </div>

    <div class="row mb-2">
        @forelse ($categories as $category)
        <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">{{ $category->id }} {{ $category->title }}</strong>
                        <h3 class="mb-0">
                            <a href="{{ route('category.show', $category->slug) }}">
                        </h3>
                        <div class="mb-1 text-muted">{{ $category->slug }}</div>
                        <a href="{{ route('category.show', $category->slug) }}">
                            Новости категории...                
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>  
                    </div>
                </div>
        </div>
        @empty
            <h2>Новостей нет</h2>  
        @endforelse
    </div>

    {{-- <div class="row mb-2">
        @foreach ($categories as $category)
        <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">{{ $category['id'] }} {{ $category['title'] }}</strong>
                        <h3 class="mb-0">
                            <a href="{{ route('category.show', $category['slug']) }}">
                        </h3>
                        <div class="mb-1 text-muted">{{ $category['slug']}}</div>
                        <a href="{{ route('category.show', $category['slug']) }}">
                            Новости категории...                
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>  
                    </div>
                </div>
        </div>  
        @endforeach
    </div> --}}

@endsection        


    {{-- @foreach ($categories as $category)
        <div style="border: 1px solid green">
            <h3>{{ $category['id'] }}</h3>
            <a href="{{ route('category.show', $category['slug']) }}">
                <h2>{{ $category['title'] }}</h2>                
            </a>
            <p>{{ $category['slug'] }}</p>

        </div>
    @endforeach --}}