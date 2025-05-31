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
    </div>
@endsection
