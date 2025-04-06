@extends('layouts.layout')

@section('title', 'Редактирование жанра')

@section('content')
    <a class="btn" href="/genres">Вернуться к списку</a>

    <form class="flex border" action="{{ route('genres.update', $genre->id) }}" method="POST" enctype="application/x-www-form-urlencoded">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")
            </script>
        @endif

        <div>
            <div>
                @error('name')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>Название жанра:</label>
                <input name="name" type="text" placeholder="Введите название">
            </div>

            <button class="btn" type="submit">Обновить жанр</button>
        </div>
    </form>
@endsection
