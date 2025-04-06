@extends('layouts.layout')

@section('title', 'Список жанров')

@section('content')
    <a class="btn" href="{{ route('genres.create') }}">Добавить жанр</a>
    @foreach($genres as $genre)
        <a href="/genres/show/{{$genre->id}}">
            <div class="flex border">
                <div>
                    <div>Название жанра: {{ $genre->name }}</div>
                </div>
            </div>
        </a>
    @endforeach
@endsection
