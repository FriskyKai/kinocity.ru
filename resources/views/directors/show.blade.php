@extends('layouts.layout')

@section('title', 'Просмотр режиссёра')

@section('content')
    <a class="btn" href="/directors">Вернуться к списку</a>
    <a class="btn" href="/directors/edit/{{$director->id}}">Редактировать режиссёра</a>
    <a class="btn" href="/directors/delete/{{$director->id}}">Удалить режиссёра</a>

    <div class="flex border">
        <div class="flex">
            <img class="big-photo" src="{{ Str::startsWith($director->photo, 'assets/') ? asset($director->photo) : asset('storage/' . $director->photo) }}" alt="Фото"/>
            <div class="media-info">
                <div>Фамилия: {{ $director->surname }}</div>
                <div>Имя: {{ $director->name }}</div>
                <div>Дата рождения: {{ $director->birthday }}</div>
                <div>Биография: {{ $director->bio }}</div>
            </div>
        </div>
    </div>
@endsection
