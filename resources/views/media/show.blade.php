@extends('layouts.layout')

@section('title', 'Просмотр медиа')

@section('content')
    <div class="container">
        <div>
            <div class="action-buttons">
                <a class="btn btn-back" href="/media">
                    <i class="icon-arrow-right"></i> Вернуться к списку
                </a>
                <a href="/media/edit/{{$media->id}}">
                    <button class="btn">
                        <i class="btn-icon-edit"></i> Редактировать
                    </button>
                </a>
                <form method="GET" action="{{ route('media.destroy', $media->id) }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn" onclick="return confirm('Вы уверены, что хотите удалить это медиа?')">
                        <i class="btn-icon-delete"></i> Удалить
                    </button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h1 class="card-title">{{ $media->name }}</h1>
                <div class="media-badges">
                    <span class="badge bg-primary-light">{{ $media->type ? 'Сериал' : 'Фильм' }}</span>
                    <span class="badge bg-secondary-light">{{ $media->ageRating->age }}</span>
                    <span class="badge bg-accent-light">{{ $media->duration }} мин.</span>
                </div>
            </div>
            <div class="card-body">
                <div class="media-main">
                    <img class="media-view-preview"
                         src="{{ Str::startsWith($media->preview, 'assets/') ? asset($media->preview) : asset('storage/' . $media->preview) }}"
                         alt="Превью {{ $media->name }}"
                         onerror="this.src='{{ asset('assets/default-media.jpg') }}'">
                    <div class="media-info">
                        <div class="detail-grid">
                            <div class="detail-item">
                                <span class="detail-label">Студия:</span>
                                <span class="detail-value">{{ $media->studio->name }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Дата выхода:</span>
                                <span class="detail-value">{{ $media->release }}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Рейтинг:</span>
                                <span class="detail-value">{{ $media->rating }}/10</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Кол-во серий:</span>
                                <span class="detail-value">{{ $media->episodes ? $media->episodes : 1 }}</span>
                            </div>
                        </div>
                        <div class="description-section">
                            <h3 class="section-title">Описание</h3>
                            <p class="description-text">{{ $media->description }}</p>
                        </div>
                    </div>
                </div>

                <!-- Кадры -->
                <div class="module-section">
                    <div class="module-header">
                        <h2 class="module-title">Кадры</h2>
                        <a class="btn btn-primary" href="{{ route('footages.create', ['media_id' => $media->id]) }}">
                            <i class="icon-plus"></i> Добавить кадр
                        </a>
                    </div>
                    <div class="footages-grid">
                        @foreach($footages as $footage)
                            <a href="{{ route('footages.show', $footage->id) }}" class="footage-item">
                                <img src="{{ Str::startsWith($footage->photo, 'assets/') ? asset($footage->photo) : asset('storage/' . $footage->photo) }}"
                                     alt="Кадр из {{ $media->name }}"
                                     onerror="this.src='{{ asset('assets/default-footage.jpg') }}'">
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Режиссеры -->
                <div class="module-section">
                    <div class="module-header">
                        <h2 class="module-title">Режиссёры</h2>
                        <a class="btn btn-primary" href="{{ route('media-directors.create', ['media_id' => $media->id]) }}">
                            <i class="icon-plus"></i> Добавить режиссёра
                        </a>
                    </div>
                    <div class="persons-list">
                        @foreach($media->mediaDirectors as $mediaDirector)
                            <div class="person-item">
                                <span>{{ $mediaDirector->director->surname }} {{ $mediaDirector->director->name }}</span>
                                <form method="GET" action="{{ route('media-directors.destroy', $mediaDirector->id) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-icon btn-danger btn-icon-delete" title="Удалить">Удалить</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Актёры -->
                <div class="module-section">
                    <div class="module-header">
                        <h2 class="module-title">Актёры</h2>
                        <a class="btn btn-primary" href="{{ route('media-actors.create', ['media_id' => $media->id]) }}">
                            <i class="icon-plus"></i> Добавить актёра
                        </a>
                    </div>
                    <div class="persons-list">
                        @foreach($media->mediaActors as $mediaActor)
                            <div class="person-item">
                                <span>{{ $mediaActor->actor->surname }} {{ $mediaActor->actor->name }}</span>
                                <form method="GET" action="{{ route('media-actors.destroy', $mediaActor->id) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-icon btn-danger btn-icon-delete" title="Удалить">Удалить</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Жанры -->
                <div class="module-section">
                    <div class="module-header">
                        <h2 class="module-title">Жанры</h2>
                        <a class="btn btn-primary" href="{{ route('media-genres.create', ['media_id' => $media->id]) }}">
                            <i class="icon-plus"></i> Добавить жанр
                        </a>
                    </div>
                    <div class="genres-list">
                        @foreach($media->mediaGenres as $mediaGenre)
                            <div class="genre-item">
                                <span>{{ $mediaGenre->genre->name }}</span>
                                <form method="GET" action="{{ route('media-genres.destroy', $mediaGenre->id) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-icon btn-danger btn-icon-delete" title="Удалить">Удалить</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Содержимое медиа -->
                <div class="module-section">
                    <div class="module-header">
                        <h2 class="module-title">Содержимое медиа</h2>
                        @if($media->type == 1) <!-- Сериал -->
                        <a class="btn btn-primary" href="{{ route('series.create', ['media_id' => $media->id]) }}">
                            <i class="icon-plus"></i> Добавить серию
                        </a>
                        @endif
                    </div>

                    @if($media->type == 0) <!-- Фильм -->
                    <div class="content-item">
                        <i class="icon-link"></i>
                        <a href="{{ $media->contentURL }}" target="_blank" class="content-link">
                            {{ $media->contentURL }}
                        </a>
                    </div>
                    @else <!-- Сериал -->
                    <div class="series-list">
                        @foreach($media->series as $series)
                            <div class="series-item">
                                <div class="series-content">
                                    <div class="series-header">
                                        <h4 class="series-title">Серия {{ $series->series_number }}</h4>
                                        <a href="{{ $series->url }}" target="_blank" class="content-link">
                                            <i class="icon-link"></i> {{ $series->url }}
                                        </a>
                                    </div>
                                    <form method="GET" action="{{ route('series.destroy', $series->id) }}" class="series-action">
                                        @csrf
                                        <button type="submit" class="btn btn-icon btn-danger btn-icon-delete" title="Удалить">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Комментарии -->
                <div class="module-section">
                    <h2 class="module-title">Комментарии</h2>
                    <div class="reviews-list">
                        @foreach($reviews as $review)
                            <div class="review-item">
                                <div class="review-header">
                                    <div class="review-author">{{ $review->user->name }}</div>
                                    <div class="review-rating">
                                        <span class="rating-value">{{ $review->rating }}</span>
                                        <i class="icon-star"></i>
                                    </div>
                                </div>
                                <div class="review-text">{{ $review->text }}</div>
                                <div class="review-actions">
                                    <form method="GET" action="{{ route('reviews.destroy', $review->id) }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-icon btn-danger btn-icon-delete" title="Удалить">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
