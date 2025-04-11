@extends('layouts.layout')

@section('title', 'Просмотр медиа')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

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
            <div>
                <label>Режиссёры:</label>
                <a class="btn" href="{{ route('media-directors.create', ['media_id' => $media->id]) }}">Добавить режиссёра</a>
                @foreach($media->mediaDirectors as $mediaDirector)
                    <div class="flex center border-list">
                        <p>{{ $mediaDirector->director->surname . ' ' . $mediaDirector->director->name }};</p>
                        <a class="btn" href="{{ route('media-directors.destroy', ['id' => $mediaDirector->id]) }}">Удалить</a>
                    </div>
                @endforeach
            </div>
            <div>
                <label>Актёры:</label>
                <a class="btn" href="{{ route('media-actors.create', ['media_id' => $media->id]) }}">Добавить актёра</a>
                @foreach($media->mediaActors as $mediaActor)
                    <div class="flex center border-list">
                        <p>{{ $mediaActor->actor->surname . ' ' . $mediaActor->actor->name }};</p>
                        <a class="btn" href="{{ route('media-actors.destroy', ['id' => $mediaActor->id]) }}">Удалить</a>
                    </div>
                @endforeach
            </div>
            <div>
                <label>Жанры:</label>
                <a class="btn" href="{{ route('media-genres.create', ['media_id' => $media->id]) }}">Добавить жанр</a>
                @foreach($media->mediaGenres as $mediaGenre)
                    <div class="flex center border-list">
                        <p>{{ $mediaGenre->genre->name }};</p>
                        <a class="btn" href="{{ route('media-genres.destroy', ['id' => $mediaGenre->id]) }}">Удалить</a>
                    </div>
                @endforeach
            </div>

            <div>
                @foreach($footages as $footage)
                    <img class="footage" src="{{ asset('storage/' . $footage->photo) }}" alt="Кадр">
                @endforeach
            </div>
        </div>
    </div>
@endsection
