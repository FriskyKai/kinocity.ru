@extends('layouts.layout')

@section('title', 'Добавление жанра')

@section('content')
    <a class="btn" href="/genres">Вернуться к списку</a>

    <form class="flex border" action="{{ route('genres.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")
            </script>
        @endif

        <div>
            @if (!empty($mediaId))
                <input type="hidden" name="media_id" value="{{ $mediaId }}">
            @endif
            <p>* - Обязательное поле</p>
            <div>
                @error('name')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Название жанра:</label>
                <input name="name" type="text" placeholder="Введите название" required>
            </div>

            <button class="btn" type="submit">Добавить жанр</button>
        </div>
    </form>
@endsection

