@extends('layouts.main')

@section('title', 'О проекте')

@section('content')


    <div>
        <h2>О проекте</h2>
        <h3>Контакты:</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit cum, similique odio alias aut maxime quod distinctio libero voluptatum dolore accusamus repellendus amet hic architecto dicta ducimus nulla quae at, quos quisquam dolores. exercitationem expedita! Perspiciatis nostrum nemo totam sunt omnis dolor debitis vel non, itaque rerum tenetur, exercitationem labore quam natus accusamus cupiditate veritatis minima velit adipisci. Amet maiores ea obcaecati!</p>
    </div>

    <div class="row mb-2">
        @forelse ($sectionsList as $section)
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-success">{{ $section->id }} {{ $section->title }}</strong>
                    <h3 class="mb-0">
                        {{ $section->resume }}
                        {{-- <a href="{{ route('category.show', $section->slug) }}"> --}}
                    </h3>
                    <div class="mb-1 text-muted">{{ $section->description }}</div>
                    {{-- <a href="{{ route('category.show', $section->slug) }}"> 
                        Новости категории...                
                    </a>--}}
                </div>
                <div class="col-auto d-none d-lg-block">
                    {{ $section->image }}  
                </div>
            </div>
        </div>
        @empty
        <h2>Разделов нет</h2>
        @endforelse
    </div>

    @endsection
    
