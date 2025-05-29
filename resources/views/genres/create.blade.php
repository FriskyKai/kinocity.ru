{{--@extends('layouts.layout')--}}

{{--@section('title', 'Добавление жанра')--}}

{{--@section('content')--}}
{{--    <a class="btn" href="/genres">Вернуться к списку</a>--}}

{{--    <form class="flex border" action="{{ route('genres.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        @if($errors->any())--}}
{{--            <script>--}}
{{--                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")--}}
{{--            </script>--}}
{{--        @endif--}}

{{--        <div>--}}
{{--            @if (!empty($mediaId))--}}
{{--                <input type="hidden" name="media_id" value="{{ $mediaId }}">--}}
{{--            @endif--}}
{{--            <p>* - Обязательное поле</p>--}}
{{--            <div>--}}
{{--                @error('name')--}}
{{--                    <p class="warning">{{ $message }}</p>--}}
{{--                @enderror--}}
{{--                <label>* Название жанра:</label>--}}
{{--                <input name="name" type="text" placeholder="Введите название" required>--}}
{{--            </div>--}}

{{--            <button class="btn" type="submit">Добавить жанр</button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--@endsection--}}

@extends('layouts.layout')

@section('title', 'Добавление жанра')

@section('content')
    <div class="container">
        <a class="btn btn-back" href="/genres">
            <i class="icon-arrow-left"></i> Вернуться к списку
        </a>

        <h1 class="form-title">Добавление нового жанра</h1>

        <form class="form-card" action="{{ route('genres.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if($errors->any())
                <div class="alert alert-error">
                    Ошибка валидации данных. Пожалуйста, исправьте указанные ошибки.
                </div>
            @endif

            <div class="form-notes">
                <p>* - Обязательное поле</p>
            </div>

            <div class="form-group">
                <label class="form-label" for="name">
                    * Название жанра:
                </label>
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
                <input class="form-input"
                       name="name"
                       id="name"
                       type="text"
                       placeholder="Введите название"
                       required
                       value="{{ old('name') }}">
            </div>

            <button class="btn btn-submit" type="submit">Добавить жанр</button>
        </form>
    </div>
@endsection
