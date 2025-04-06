@extends('layouts.layout')

@section('title', 'Добавление актёра')

@section('content')
    <a class="btn" href="/actors">Вернуться к списку</a>

    <form class="flex border" action="{{ route('actors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")
            </script>
        @endif

        <div>
            <p>* - Обязательное поле</p>
            <div>
                @error('photo')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>Фото:</label>
                <input name="photo" type="file">
            </div>
            <div>
                @error('surname')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Фамилия:</label>
                <input name="surname" type="text" placeholder="Введите фамилию" required>
            </div>
            <div>
                @error('name')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Имя:</label>
                <input name="name" type="text" placeholder="Введите имя" required>
            </div>
            <div>
                @error('birthday')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Дата рождения:</label>
                <input name="birthday" type="date" required>
            </div>
            <div>
                @error('bio')
                <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Биография:</label>
                <input name="bio" type="text" placeholder="Введите биографию" required>
            </div>

            <button class="btn" type="submit">Добавить актёра</button>
        </div>
    </form>
@endsection
