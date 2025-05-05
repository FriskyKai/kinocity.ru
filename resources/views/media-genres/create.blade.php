@extends('layouts.layout')

@section('title', 'Добавление жанра к медиа')

@section('content')
    <a class="btn" href="/media/show/{{$media->id}}">Вернуться к медиа</a>

    <form class="flex border" action="{{ route('media-genres.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")
            </script>
        @endif

        <div>
            <p>* - Обязательное поле</p>
            <input type="hidden" name="media_id" value="{{ $media->id }}">
            <div>
                @error('genre_id')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Выберите жанр:</label>
                <select name="genre_id">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                <a class="btn btn-do" href="{{ route('genres.create', ['media_id' => $media->id]) }}">Создать новый жанр</a>
            </div>

            <button class="btn" type="submit">Добавить жанр</button>
        </div>
    </form>
@endsection
