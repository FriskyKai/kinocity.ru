@extends('layouts.layout')

@section('title', 'Просмотр актёра')

@section('content')
    <a class="btn" href="/actors">Вернуться к списку</a>
    <a class="btn" href="/actors/edit/{{$actor->id}}">Редактировать актёра</a>
    <a class="btn" href="/actors/delete/{{$actor->id}}">Удалить актёра</a>

    <div class="flex border">
        <div>
            <img src="{{ asset('storage/' . $actor->photo) }}" alt="Фото" width="75"/>
            <div>Фамилия: {{ $actor->surname }}</div>
            <div>Имя: {{ $actor->name }}</div>
            <div>Дата рождения: {{ $actor->birthday }}</div>
            <div>Биография: {{ $actor->bio }}</div>
        </div>
    </div>
@endsection
