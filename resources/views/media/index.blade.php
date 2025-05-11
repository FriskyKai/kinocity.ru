@extends('layouts.layout')

@section('title', 'Список медиа')

@section('content')
    <a class="btn" href="{{ route('media.create') }}">Добавить медиа</a>
    @foreach($mediaCatalog as $media)
        <a href="/media/show/{{$media->id}}">
            <div class="flex border media-card">
                <div class="flex">
                    <img class="small-photo" src="{{ Str::startsWith($media->preview, 'assets/') ? asset($media->preview) : asset('storage/' . $media->preview) }}" alt="Превью"/>
                    <div class="media-info">
                        <div>Название: {{ $media->name }}</div>
                        <div class="description">Описание: {{ $media->description }}</div>
                        <div>Тип: {{ $media->type ? 'Сериал' : 'Фильм' }}</div>
                        <div>Студия: {{ $media->studio->name }}</div>
                        <div>Возр.рейтинг: {{ $media->ageRating->age }}</div>
                        <div>Продолжительность: {{ $media->duration }}</div>
                        <div>Дата выхода: {{ $media->release }}</div>
                        <div>Рейтинг: {{ $media->rating }}</div>
                        <div>Кол-во серий: {{ $media->episodes ? $media->episodes : 1}}</div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
@endsection


