@extends('layouts.layout')

@section('title', 'Просмотр жанра')

@section('content')
    <a class="btn" href="/genres">Вернуться к списку</a>
    <a class="btn" href="/genres/edit/{{$genre->id}}">Редактировать жанр</a>
    <a class="btn" href="/genres/delete/{{$genre->id}}">Удалить жанр</a>

    <div class="flex border">
        <div>
            <div>Название жанра: {{ $genre->name }}</div>
        </div>
    </div>
@endsection
