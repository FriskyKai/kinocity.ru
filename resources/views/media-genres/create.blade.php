@extends('layouts.layout')

@section('title', 'Добавление жанра к медиа')

@section('content')
    <div class="container">
        <a href="/media/show/{{$media->id}}">
            <button class="btn btn-back">
                <i class="btn-icon-view"></i> Просмотр медиа
            </button>
        </a>

        <h1 class="form-title">Добавление жанра к медиа</h1>

        <form class="form-card" action="{{ route('media-genres.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
            @csrf

            @if($errors->any())
                <div class="alert alert-error">
                    Ошибка валидации данных. Пожалуйста, исправьте указанные ошибки.
                </div>
            @endif

            <div class="form-notes">
                <p>* - Обязательное поле</p>
            </div>

            <input type="hidden" name="media_id" value="{{ $media->id }}">

            <div class="form-group">
                @error('genre_id')
                    <p class="form-error">{{ $message }}</p>
                @enderror
                <label class="form-label" for="genre_id">
                    * Выберите жанр:
                </label>
                <select class="form-select" name="genre_id" id="genre_id" required>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
                <div class="mt-2">
                    <a class="btn btn-do" href="{{ route('genres.create', ['media_id' => $media->id]) }}">
                        Добавить новый жанр
                    </a>
                </div>
            </div>

            <button class="btn btn-submit" type="submit">Добавить жанр</button>
        </form>
    </div>
@endsection
