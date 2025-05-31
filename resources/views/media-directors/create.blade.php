@extends('layouts.layout')

@section('title', 'Добавление режиссёра к медиа')

@section('content')
    <div class="container">
        <a href="/media/show/{{$media->id}}">
            <button class="btn btn-back">
                <i class="btn-icon-view"></i> Просмотр медиа
            </button>
        </a>

        <h1 class="form-title">Добавление режиссёра к медиа</h1>

        <form class="form-card" action="{{ route('media-directors.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
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
                @error('director_id')
                <p class="form-error">{{ $message }}</p>
                @enderror
                <label class="form-label" for="director_id">
                    * Выберите режиссёра:
                </label>
                <select class="form-select" name="director_id" id="director_id" required>
                    @foreach($directors as $director)
                        <option value="{{ $director->id }}">
                            {{ $director->name }} {{ $director->surname }}
                        </option>
                    @endforeach
                </select>
                <div class="mt-2">
                    <a class="btn btn-do" href="{{ route('directors.create', ['media_id' => $media->id]) }}">
                        Добавить нового режиссёра
                    </a>
                </div>
            </div>

            <button class="btn btn-submit" type="submit">Добавить режиссёра</button>
        </form>
    </div>
@endsection
