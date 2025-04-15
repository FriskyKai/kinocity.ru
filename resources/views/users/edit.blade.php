@extends('layouts.layout')

@section('title', 'Редактирование пользователя')

@section('content')
    <a class="btn" href="/users">Вернуться к списку</a>
    <a class="btn" href="/users/show/{{$user->id}}">Вернуться к пользователю</a>

    <form class="flex border" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")
            </script>
        @endif

        <div class="flex">
            <img class="big-photo" src="{{ Str::startsWith($user->avatar, 'assets/') ? asset($user->avatar) : asset('storage/' . $user->avatar) }}" alt="Аватар"/>
            <div class="media-info">
                <div>
                    @error('avatar')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Аватар:</label>
                    <div class="file-upload">
                        <input type="file" id="fileInput" name="avatar" class="file-input">
                        <label for="fileInput" class="file-button">Обзор</label>
                    </div>
                </div>
                <div>
                    @error('role_id')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Роль:</label>
                    <select name="role_id" class="dropdown">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" @if($role->id === $user->role->id) selected @endif>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    @error('surname')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Фамилия:</label>
                    <input name="surname" type="text" placeholder="Введите фамилию" value="{{ $user->surname }}">
                </div>
                <div>
                    @error('name')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Имя:</label>
                    <input name="name" type="text" placeholder="Введите имя" value="{{ $user->name }}">
                </div>
                <div>
                    @error('email')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Email:</label>
                    <input name="email" type="email" placeholder="Введите email" value="{{ $user->email}}">
                </div>
                <div>
                    @error('birthday')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Дата рождения:</label>
                    <input name="birthday" type="date" value="{{ $user->birthday }}">
                </div>

                <button class="btn" type="submit">Обновить данные</button>
            </div>
        </div>
    </form>
@endsection
