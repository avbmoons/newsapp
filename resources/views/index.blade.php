@extends('layouts.main')

@section('title', 'Главная')

@section('content')

    <div>
        <h2>Добро пожаловать в агрегатор новостей!</h2>
        <br>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolor minima ducimus cum autem. Sit soluta atque modi labore nihil facilis nobis reiciendis aliquam quibusdam, veritatis minima laboriosam cum impedit omnis minus? Et soluta minima pariatur a. Perferendis aspernatur dolorum laboriosam nulla, eveniet sunt, ipsam vitae exercitationem quam corrupti ratione placeat ab.</p>
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
    
