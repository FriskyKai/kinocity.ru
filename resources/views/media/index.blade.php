@extends('layouts.layout')

@section('title', 'Список медиа')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="h-title">Медиа</h1>
            <a href="{{ route('media.create') }}" class="btn btn-primary">
                <i class="icon-plus"></i> Добавить медиа
            </a>
        </div>

        <!-- Форма поиска -->
        <div class="search-container" style="margin-bottom: 20px;">
            <form action="{{ route('media.index') }}" method="GET">
                <div class="search-input-group">
                    <input type="text"
                           name="search"
                           placeholder="Поиск по названию..."
                           value="{{ request('search') }}"
                           class="search-input">
                    <button type="submit" class="search-button">
                        <i class="icon-search"></i> Найти
                    </button>
                    @if(request()->has('search'))
                        <a href="{{ route('media.index') }}" class="search-clear">X Сбросить
                        </a>
                    @endif
                </div>
            </form>
        </div>

        @if($mediaCatalog->isEmpty())
            <p class="no-results">Медиа не найдены.</p>
        @else
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
        @endif
    </div>
@endsection

