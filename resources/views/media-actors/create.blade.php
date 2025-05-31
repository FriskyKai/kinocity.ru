@extends('layouts.layout')

@section('title', 'Добавление актёра к медиа')

@section('content')
    <div class="container">
        <a href="/media/show/{{$media->id}}">
            <button class="btn btn-back">
                <i class="btn-icon-view"></i> Просмотр медиа
            </button>
        </a>

        <h1 class="form-title">Добавление актёра к медиа</h1>

        <form class="form-card" action="{{ route('media-actors.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
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
                @error('actor_id')
                    <p class="form-error">{{ $message }}</p>
                @enderror
                <label class="form-label" for="actor_id">
                    * Выберите актёра:
                </label>
                <select class="form-select" name="actor_id" id="actor_id" required>
                    @foreach($actors as $actor)
                        <option value="{{ $actor->id }}">
                            {{ $actor->name }} {{ $actor->surname }}
                        </option>
                    @endforeach
                </select>
                <div class="mt-2">
                    <a class="btn btn-do" href="{{ route('actors.create', ['media_id' => $media->id]) }}">
                        Добавить нового актёра
                    </a>
                </div>
            </div>

            <button class="btn btn-submit" type="submit">Добавить актёра</button>
        </form>
    </div>
@endsection
