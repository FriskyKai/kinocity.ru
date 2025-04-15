@extends('layouts.layout')

@section('title', 'Просмотр медиа')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <a class="btn" href="/media">Вернуться к списку</a>
    <a class="btn" href="/media/edit/{{$media->id}}">Редактировать медиа</a>
    <a class="btn" href="/media/delete/{{$media->id}}">Удалить медиа</a>

    <div class="flex border">
        <div>
            <div class="flex">
                <img class="big-photo" src="{{ Str::startsWith($media->preview, 'assets/') ? asset($media->preview) : asset('storage/' . $media->preview) }}" alt="Превью"/>
                <div class="media-info">
                    <div>Название: {{ $media->name }}</div>
                    <div>Описание: {{ $media->description }}</div>
                    <div>Тип: {{ $media->type ? 'Сериал' : 'Фильм' }}</div>
                    <div>Студия: {{ $media->studio->name }}</div>
                    <div>Возр.рейтинг: {{ $media->ageRating->age }}</div>
                    <div>Продолжительность: {{ $media->duration }}</div>
                    <div>Дата выхода: {{ $media->release }}</div>
                    <div>Рейтинг: {{ $media->rating }}</div>
                    <div>Кол-во серий: {{ $media->episodes ? $media->episodes : 1}}</div>
                </div>
            </div>
            <div class="media-module">
                <div>
                    @foreach($footages as $footage)
                        <a href="{{ route('footages.show', $footage->id) }}">
                            <img class="footage" src="{{ Str::startsWith($footage->photo, 'assets/') ? asset($footage->photo) : asset('storage/' . $footage->photo) }}" alt="Кадр"/>
                        </a>
                    @endforeach
                </div>
                <a class="btn" href="{{ route('footages.create', ['media_id' => $media->id]) }}">Добавить кадр</a>
            </div>
            <div class="media-module border-list">
                <label>Режиссёры:</label>
                <a class="btn" href="{{ route('media-directors.create', ['media_id' => $media->id]) }}">Добавить режиссёра</a>
                @foreach($media->mediaDirectors as $mediaDirector)
                    <div class="flex center">
                        <p>{{ $mediaDirector->director->surname . ' ' . $mediaDirector->director->name }}</p>
                        <a class="btn" href="{{ route('media-directors.destroy', ['id' => $mediaDirector->id]) }}">Удалить</a>
                    </div>
                @endforeach
            </div>
            <div class="media-module border-list">
                <label>Актёры:</label>
                <a class="btn" href="{{ route('media-actors.create', ['media_id' => $media->id]) }}">Добавить актёра</a>
                @foreach($media->mediaActors as $mediaActor)
                    <div class="flex center">
                        <p>{{ $mediaActor->actor->surname . ' ' . $mediaActor->actor->name }}</p>
                        <a class="btn" href="{{ route('media-actors.destroy', ['id' => $mediaActor->id]) }}">Удалить</a>
                    </div>
                @endforeach
            </div>
            <div class="media-module border-list">
                <label>Жанры:</label>
                <a class="btn btn-do" href="{{ route('media-genres.create', ['media_id' => $media->id]) }}">Добавить жанр</a>
                @foreach($media->mediaGenres as $mediaGenre)
                    <div class="flex center">
                        <p>{{ $mediaGenre->genre->name }}</p>
                        <a class="btn" href="{{ route('media-genres.destroy', ['id' => $mediaGenre->id]) }}">Удалить</a>
                    </div>
                @endforeach
            </div>
            <div class="media-module">
                <label>Комментарии:</label>
                @foreach($reviews as $review)
                    <div class="flex center border-list">
                        <div class="div85">
                            <p>{{ $review->user->name}}</p>
                            <p>{{ $review->text}}</p>
                        </div>
                        <div>
                            <p>Оценка: {{ $review->rating}}</p>
                        </div>
                        <a class="btn" href="{{ route('reviews.destroy', ['id' => $review->id]) }}">Удалить</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
