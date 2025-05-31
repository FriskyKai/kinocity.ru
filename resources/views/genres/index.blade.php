@extends('layouts.layout')

@section('title', 'Список жанров')

@section('content')
    <div class="container">
        <div class="genres-header">
            <h1 class="genres-title">Жанры</h1>
            <a href="{{ route('genres.create') }}" class="btn btn-primary">
                <i class="icon-plus"></i> Добавить жанр
            </a>
        </div>

        <!-- Форма поиска -->
        <div class="search-container" style="margin-bottom: 20px;">
            <form action="{{ route('genres.index') }}" method="GET">
                <div class="search-input-group">
                    <input type="text"
                           name="search"
                           placeholder="Поиск по названию..."
                           value="{{ request('search') }}"
                           class="search-input">
                    <button type="submit" class="search-button">
                        <i class="icon-search"></i> Найти
                    </button>
                    @if(request()->has('search'))
                        <a href="{{ route('genres.index') }}" class="search-clear">X Сбросить
                        </a>
                    @endif
                </div>
            </form>
        </div>

        @if($genres->isEmpty())
            <p class="no-results">Жанры не найдены.</p>
        @else
            <div class="genres-list">
                @foreach($genres as $genre)
                    <a href="/genres/show/{{$genre->id}}" class="genre-card">
                        <div class="genre-content">
                            <h3 class="genre-name">{{ $genre->name }}</h3>
                        </div>
                        <i class="icon-arrow-right"></i>
                    </a>
                @endforeach
            </div>
        @endif


    </div>
@endsection
