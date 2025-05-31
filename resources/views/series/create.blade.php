@extends('layouts.layout')

@section('title', 'Добавление серии')

@section('content')
    <div class="container">
        <a href="/media/show/{{$media->id}}">
            <button class="btn btn-back">
                <i class="btn-icon-view"></i> Просмотр медиа
            </button>
        </a>

        <h1 class="form-title">Добавление новой серии</h1>

        <form class="form-card" action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if($errors->any())
                <div class="alert alert-error">
                    Ошибка валидации данных. Пожалуйста, исправьте указанные ошибки.
                </div>
            @endif

            <div class="form-notes">
                <p>* - Обязательное поле</p>
            </div>

            <!-- Скрытое поле для media_id -->
            <input type="hidden" name="media_id" value="{{ $media->id }}">

            <!-- Поле для номера серии -->
            <div class="form-group">
                <label class="form-label" for="series_number">
                    * Номер серии:
                </label>
                @error('series_number')
                <p class="form-error">{{ $message }}</p>
                @enderror
                <input class="form-input"
                       name="series_number"
                       id="series_number"
                       type="number"
                       min="1"
                       placeholder="Введите номер серии"
                       required
                       value="{{ old('series_number') }}">
            </div>

            <!-- Поле для ссылки на контент -->
            <div class="form-group">
                <label class="form-label" for="url">
                    * Ссылка на контент:
                </label>
                @error('url')
                <p class="form-error">{{ $message }}</p>
                @enderror
                <input class="form-input"
                       name="url"
                       id="url"
                       type="text"
                       placeholder="Введите ссылку на контент"
                       required
                       value="{{ old('url') }}">
            </div>

            <button class="btn btn-submit" type="submit">Добавить серию</button>
        </form>
    </div>
@endsection
