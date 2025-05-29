{{--@extends('layouts.layout')--}}

{{--@section('title', 'Список медиа')--}}

{{--@section('content')--}}
{{--    <a class="btn" href="{{ route('media.create') }}">Добавить медиа</a>--}}
{{--    @foreach($mediaCatalog as $media)--}}
{{--        <a href="/media/show/{{$media->id}}">--}}
{{--            <div class="flex border media-card">--}}
{{--                <div class="flex">--}}
{{--                    <img class="small-photo" src="{{ Str::startsWith($media->preview, 'assets/') ? asset($media->preview) : asset('storage/' . $media->preview) }}" alt="Превью"/>--}}
{{--                    <div class="media-info">--}}
{{--                        <div>Название: {{ $media->name }}</div>--}}
{{--                        <div class="description">Описание: {{ $media->description }}</div>--}}
{{--                        <div>Тип: {{ $media->type ? 'Сериал' : 'Фильм' }}</div>--}}
{{--                        <div>Студия: {{ $media->studio->name }}</div>--}}
{{--                        <div>Возр.рейтинг: {{ $media->ageRating->age }}</div>--}}
{{--                        <div>Продолжительность: {{ $media->duration }}</div>--}}
{{--                        <div>Дата выхода: {{ $media->release }}</div>--}}
{{--                        <div>Рейтинг: {{ $media->rating }}</div>--}}
{{--                        <div>Кол-во серий: {{ $media->episodes ? $media->episodes : 1}}</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </a>--}}
{{--    @endforeach--}}
{{--@endsection--}}

@extends('layouts.layout')

@section('title', 'Список медиа')

@section('content')
    <div class="container">
        <div class="action-buttons">
            <a href="{{ route('media.create') }}" class="btn btn-primary">
                <i class="icon-plus"></i> Добавить медиа
            </a>
        </div>

        <div class="media-grid">
            @foreach($mediaCatalog as $media)
                <a href="/media/show/{{$media->id}}" class="media-card">
                    <div class="media-preview">
                        <img src="{{ Str::startsWith($media->preview, 'assets/') ? asset($media->preview) : asset('storage/' . $media->preview) }}"
                             alt="{{ $media->name }}"
                             class="media-image"/>
                        <div class="media-badge">
                            {{ $media->type ? 'Сериал' : 'Фильм' }}
                        </div>
                    </div>
                    <div class="media-content">
                        <h3 class="media-title">{{ $media->name }}</h3>
                        <div class="media-meta">
                        <span class="meta-item">
                            <i class="icon-star"></i> {{ $media->rating }}
                        </span>
                            <span class="meta-item">
                            <i class="icon-time"></i> {{ $media->duration }}
                        </span>
                            <span class="meta-item">
                            <i class="icon-calendar"></i> {{ $media->release }}
                        </span>
                        </div>
                        <div class="media-description">{{ $media->description }}</div>
                        <div class="media-footer">
                            <span class="studio-badge">{{ $media->studio->name }}</span>
                            <span class="age-badge">{{ $media->ageRating->age }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection

