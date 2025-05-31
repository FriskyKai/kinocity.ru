@extends('layouts.layout')

@section('title', 'Добавление пользователя')

@section('content')
    <div class="container">
        <div class="action-buttons">
            <a class="btn btn-back" href="/users">
                <i class="icon-arrow-right"></i> Вернуться к списку
            </a>
        </div>

        <div class="form-card">
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
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
                        <div>
                            <img src="{{ asset('assets/images/default-avatar.jpg') }}"
                                 alt="Загрузите аватар"
                                 class="avatar-image"
                                 onerror="this.onerror=null;this.classList.add('broken-image')"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label">* Аватар</label>
                            <div class="file-upload-wrapper">
                                <input type="file" id="avatarUpload" name="avatar" class="file-input @error('avatar') is-invalid @enderror">
                                <label for="avatarUpload" class="file-button">Выбрать файл</label>
                                <span class="file-name-display">
                                <span id="currentFileName" style="display: inline-block; max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Файл не выбран</span>
                            </span>
                            </div>
                            @error('avatar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-fields-section">
                        <div class="form-group">
                            <label class="form-label">* Роль</label>
                            <select name="role_id" class="form-select @error('role_id') is-invalid @enderror">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @if($role->code == 'user') selected @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">* Фамилия</label>
                            <input type="text"
                                   name="surname"
                                   class="form-control @error('surname') is-invalid @enderror"
                                   placeholder="Введите фамилию"
                                   value="{{ old('surname') }}"
                                   required>
                            @error('surname')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">* Имя</label>
                            <input type="text"
                                   name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   placeholder="Введите имя"
                                   value="{{ old('name') }}"
                                   required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">* Email</label>
                            <input type="email"
                                   name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Введите email"
                                   value="{{ old('email') }}"
                                   required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">* Пароль</label>
                            <input type="password"
                                   name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Введите пароль"
                                   required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">* Дата рождения</label>
                            <input type="date"
                                   name="birthday"
                                   class="form-control @error('birthday') is-invalid @enderror"
                                   value="{{ old('birthday') }}"
                                   required>
                            @error('birthday')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Добавить пользователя</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('avatarUpload');
        const currentFileName = document.getElementById('currentFileName');

        fileInput.addEventListener('change', function() {
            if (this.files && this.files.length > 0) {
                // Полностью заменяем текст на имя нового файла
                currentFileName.textContent = this.files[0].name;
                // Применяем стили для нового файла
                currentFileName.style.color = 'green';
                currentFileName.style.fontWeight = 'bold';
            } else {
                // Возвращаем исходное состояние
                currentFileName.textContent = 'Файл не выбран';
                currentFileName.style.color = '';
                currentFileName.style.fontWeight = '';
            }
        });
    });
</script>
