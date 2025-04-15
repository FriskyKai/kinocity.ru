@extends('layouts.layout')

@section('title', 'Список медиа')

@section('content')
    <a class="btn" href="{{ route('media.create') }}">Добавить медиа</a>
    @foreach($mediaCatalog as $media)
        <a href="/media/show/{{$media->id}}">
            <div class="flex border">
                <div>
                    <img src="{{ Str::startsWith($media->preview, 'assets/') ? asset($media->preview) : asset('storage/' . $media->preview) }}" alt="Превью" width="75"/>
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
        </a>
    @endforeach
@endsection
