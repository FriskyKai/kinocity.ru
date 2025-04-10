@extends('layouts.layout')

@section('title', 'Просмотр режиссёра')

@section('content')
    <a class="btn" href="/directors">Вернуться к списку</a>
    <a class="btn" href="/directors/edit/{{$director->id}}">Редактировать режиссёра</a>
    <a class="btn" href="/directors/delete/{{$director->id}}">Удалить режиссёра</a>

    <div class="flex border">
        <div>
            <img src="{{ asset('storage/' . $director->photo) }}" alt="Фото" width="75"/>
            <div>Фамилия: {{ $director->surname }}</div>
            <div>Имя: {{ $director->name }}</div>
            <div>Дата рождения: {{ $director->birthday }}</div>
            <div>Биография: {{ $director->bio }}</div>
        </div>
    </div>
@endsection
