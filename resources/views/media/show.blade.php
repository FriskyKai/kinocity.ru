@extends('layouts.layout')

@section('title', 'Просмотр медиа')

@section('content')
    <a class="btn" href="/media">Вернуться к списку</a>
    <a class="btn" href="/media/edit/{{$media->id}}">Редактировать медиа</a>
    <a class="btn" href="/media/delete/{{$media->id}}">Удалить медиа</a>

    <div class="flex border">
        <div>
            <img src="{{ $media->preview }}" alt="Превью" width="75"/>
            <div>Название: {{ $media->name }}</div>
            <div>Описание: {{ $media->description }}</div>
            <div>Тип: {{ $media->type ? 'Сериал' : 'Фильм' }}</div>
            <div>Студия: {{ $media->studio->name }}</div>
            <div>Возр.рейтинг: {{ $media->ageRating->age }}</div>
            <div>Продолжительность: {{ $media->duration }}</div>
            <div>Дата выхода: {{ $media->release }}</div>
            <div>Рейтинг: {{ $media->rating }}</div>
            <div>Кол-во серий: {{ $media->episodes ? $media->episodes : 1}}</div>
            <div>ДОБАВИТЬ АКТЁРОВ, РЕЖИССЁРОВ, ЖАНРЫ, КАДРЫ</div>
        </div>
    </div>
@endsection
