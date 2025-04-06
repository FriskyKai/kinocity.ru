@extends('layouts.layout')

@section('title', 'Добавление пользователя')

@section('content')
    <a class="btn" href="/users">Вернуться к списку</a>

    <form class="flex border" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")
            </script>
        @endif

        <div>
            <p>* - Обязательное поле</p>
            <div>
                @error('avatar')
                   <p class="warning">{{ $message }}</p>
                @enderror
                <label>Аватар:</label>
                <input name="avatar" type="file">
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
                @error('email')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Email:</label>
                <input name="email" type="email" placeholder="Введите email" required>
            </div>
            <div>
                @error('password')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Пароль:</label>
                <input name="password" type="password" placeholder="Введите пароль" required>
            </div>
            <div>
                @error('birthday')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Дата рождения:</label>
                <input name="birthday" type="date" required>
            </div>

            <button class="btn" type="submit">Добавить пользователя</button>
        </div>
    </form>
@endsection
