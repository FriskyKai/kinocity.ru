@extends('layouts.layout')

@section('title', 'Редактирование актёра')

@section('content')
    <div class="container">
        <div class="action-buttons">
            <a href="/actors">
                <button class="btn btn-back">
                    <i class="icon-arrow-right"></i> Вернуться к списку
                </button>
            </a>
            <a href="/actors/show/{{$actor->id}}">
                <button class="btn btn-back">
                    <i class="btn-icon-view"></i> Просмотр актёра
                </button>
            </a>
        </div>

        <div class="form-card">
            <form action="{{ route('actors.update', $actor->id) }}" method="POST" enctype="multipart/form-data">
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
                            <img src="{{ Str::startsWith($actor->photo, 'assets/') ? asset($actor->photo) : asset('storage/' . $actor->photo) }}"
                                 alt="Текущий аватар"
                                 class="avatar-image"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Фотография</label>
                            <div class="file-upload-wrapper">
                                <input type="file" id="avatarUpload" name="photo" class="file-input @error('photo') is-invalid @enderror">
                                <label for="avatarUpload" class="file-button">Выбрать файл</label>
                                <span class="file-name-display">
                                <span id="currentFileName">{{ basename($actor->photo) ?? 'Файл не выбран' }}</span>
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
                            <label class="form-label">Фамилия</label>
                            <input type="text"
                                   name="surname"
                                   class="form-control @error('surname') is-invalid @enderror"
                                   placeholder="Введите фамилию"
                                   value="{{ old('surname', $actor->surname) }}">
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
                                   value="{{ old('name', $actor->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Дата рождения</label>
                            <input type="date"
                                   name="birthday"
                                   class="form-control @error('birthday') is-invalid @enderror"
                                   value="{{ old('birthday', $actor->birthday) }}">
                            @error('birthday')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Биография</label>
                            <input type="text"
                                   name="bio"
                                   class="form-control @error('bio') is-invalid @enderror"
                                   placeholder="Введите биографию"
                                   value="{{ old('bio', $actor->bio) }}">
                            @error('name')
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
