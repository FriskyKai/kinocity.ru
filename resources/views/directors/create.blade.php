@extends('layouts.layout')

@section('title', 'Добавление режиссёра')

@section('content')
    <div class="container">
        <div class="action-buttons">
            <a class="btn btn-back" href="/directors">
                <i class="icon-arrow-right"></i> Вернуться к списку
            </a>
        </div>

        <div class="form-card">
            <form action="{{ route('directors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if(request()->has('media_id'))
                    <input type="hidden" name="media_id" value="{{ request()->query('media_id') }}">
                @endif

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
                                 alt="Загрузите фото"
                                 class="avatar-image"
                                 onerror="this.onerror=null;this.classList.add('broken-image')"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label">* Фотография</label>
                            <div class="file-upload-wrapper">
                                <input type="file" id="avatarUpload" name="photo" class="file-input @error('photo') is-invalid @enderror">
                                <label for="avatarUpload" class="file-button">Выбрать файл</label>
                                <span class="file-name-display">
                                <span id="currentFileName" style="display: inline-block; max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Файл не выбран</span>
                            </span>
                            </div>
                            @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-fields-section">
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

                        <div class="form-group">
                            <label class="form-label">* Биография</label>
                            <input type="text"
                                   name="bio"
                                   class="form-control @error('bio') is-invalid @enderror"
                                   placeholder="Введите биографию"
                                   value="{{ old('bio') }}"
                                   required>
                            @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Добавить режиссёра</button>
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
