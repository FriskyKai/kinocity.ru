{{--@extends('layouts.layout')--}}

{{--@section('title', 'Редактирование пользователя')--}}

{{--@section('content')--}}
{{--    <a class="btn" href="/users">Вернуться к списку</a>--}}
{{--    <a class="btn" href="/users/show/{{$user->id}}">Вернуться к пользователю</a>--}}

{{--    <form class="flex border" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        @if($errors->any())--}}
{{--            <script>--}}
{{--                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")--}}
{{--            </script>--}}
{{--        @endif--}}

{{--        <div class="flex">--}}
{{--            <img class="big-photo" src="{{ Str::startsWith($user->avatar, 'assets/') ? asset($user->avatar) : asset('storage/' . $user->avatar) }}" alt="Аватар"/>--}}
{{--            <div class="media-info">--}}
{{--                <div>--}}
{{--                    @error('avatar')--}}
{{--                        <p class="warning">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                    <label>Аватар:</label>--}}
{{--                    <div class="file-upload">--}}
{{--                        <input type="file" id="fileInput" name="avatar" class="file-input">--}}
{{--                        <label for="fileInput" class="file-button">Обзор</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    @error('role_id')--}}
{{--                        <p class="warning">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                    <label>Роль:</label>--}}
{{--                    <select name="role_id" class="dropdown">--}}
{{--                        @foreach($roles as $role)--}}
{{--                            <option value="{{ $role->id }}" @if($role->id === $user->role->id) selected @endif>{{ $role->name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    @error('surname')--}}
{{--                        <p class="warning">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                    <label>Фамилия:</label>--}}
{{--                    <input name="surname" type="text" placeholder="Введите фамилию" value="{{ $user->surname }}">--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    @error('name')--}}
{{--                        <p class="warning">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                    <label>Имя:</label>--}}
{{--                    <input name="name" type="text" placeholder="Введите имя" value="{{ $user->name }}">--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    @error('email')--}}
{{--                        <p class="warning">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                    <label>Email:</label>--}}
{{--                    <input name="email" type="email" placeholder="Введите email" value="{{ $user->email}}">--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    @error('birthday')--}}
{{--                        <p class="warning">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                    <label>Дата рождения:</label>--}}
{{--                    <input name="birthday" type="date" value="{{ $user->birthday }}">--}}
{{--                </div>--}}

{{--                <button class="btn" type="submit">Обновить данные</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--@endsection--}}

@extends('layouts.layout')

@section('title', 'Редактирование пользователя')

@section('content')
    <div class="action-buttons">
        <a href="/users" class="btn btn-outline">← Вернуться к списку</a>
        <a href="/users/show/{{$user->id}}" class="btn btn-outline">Вернуться к пользователю</a>
    </div>

    <div class="form-card">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-grid">
                <div class="form-avatar-section">
                    <div class="avatar-preview">
                        <img src="{{ Str::startsWith($user->avatar, 'assets/') ? asset($user->avatar) : asset('storage/' . $user->avatar) }}"
                             alt="Текущий аватар"
                             class="avatar-image"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Аватар</label>
                        <div class="file-upload-wrapper">
                            <input type="file" id="avatarUpload" name="avatar" class="file-input @error('avatar') is-invalid @enderror">
                            <label for="avatarUpload" class="file-button">Выбрать файл</label>
                            <span class="file-name-display">
                                <span id="currentFileName">{{ basename($user->avatar) ?? 'Файл не выбран' }}</span>
                                <span id="newFileName"></span>
                            </span>
                        </div>
                        @error('avatar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-fields-section">
                    <div class="form-group">
                        <label class="form-label">Роль</label>
                        <select name="role_id" class="form-select @error('role_id') is-invalid @enderror">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" @if($role->id === $user->role->id) selected @endif>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Фамилия</label>
                        <input type="text"
                               name="surname"
                               class="form-control @error('surname') is-invalid @enderror"
                               placeholder="Введите фамилию"
                               value="{{ old('surname', $user->surname) }}">
                        @error('surname')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Имя</label>
                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="Введите имя"
                               value="{{ old('name', $user->name) }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="Введите email"
                               value="{{ old('email', $user->email) }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Дата рождения</label>
                        <input type="date"
                               name="birthday"
                               class="form-control @error('birthday') is-invalid @enderror"
                               value="{{ old('birthday', $user->birthday) }}">
                        @error('birthday')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Обновить данные</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('avatarUpload');
        const newFileNameDisplay = document.getElementById('newFileName');

        fileInput.addEventListener('change', function() {
            if (this.files && this.files.length > 0) {
                newFileNameDisplay.textContent = ' → ' + this.files[0].name;
                newFileNameDisplay.style.display = 'inline';
            } else {
                newFileNameDisplay.style.display = 'none';
            }
        });
    });
</script>
