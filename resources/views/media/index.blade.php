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

