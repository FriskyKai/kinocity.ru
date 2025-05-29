{{--@extends('layouts.layout')--}}

{{--@section('title', 'Добавление режиссёра')--}}

{{--@section('content')--}}
{{--    <a class="btn" href="/directors">Вернуться к списку</a>--}}

{{--    <form class="flex border" action="{{ route('directors.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        @if($errors->any())--}}
{{--            <script>--}}
{{--                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")--}}
{{--            </script>--}}
{{--        @endif--}}

{{--        <div>--}}
{{--            @if(request('media_id'))--}}
{{--                <input type="hidden" name="media_id" value="{{ request('media_id') }}">--}}
{{--            @endif--}}
{{--            <p>* - Обязательное поле</p>--}}
{{--            <div>--}}
{{--                @error('photo')--}}
{{--                    <p class="warning">{{ $message }}</p>--}}
{{--                @enderror--}}
{{--                <label>Фото:</label>--}}
{{--                <div class="file-upload">--}}
{{--                    <input type="file" id="fileInput" name="photo" class="file-input" required>--}}
{{--                    <label for="fileInput" class="file-button">Обзор</label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                @error('surname')--}}
{{--                    <p class="warning">{{ $message }}</p>--}}
{{--                @enderror--}}
{{--                <label>* Фамилия:</label>--}}
{{--                <input name="surname" type="text" placeholder="Введите фамилию" required>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                @error('name')--}}
{{--                    <p class="warning">{{ $message }}</p>--}}
{{--                @enderror--}}
{{--                <label>* Имя:</label>--}}
{{--                <input name="name" type="text" placeholder="Введите имя" required>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                @error('birthday')--}}
{{--                    <p class="warning">{{ $message }}</p>--}}
{{--                @enderror--}}
{{--                <label>* Дата рождения:</label>--}}
{{--                <input name="birthday" type="date" required>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                @error('bio')--}}
{{--                    <p class="warning">{{ $message }}</p>--}}
{{--                @enderror--}}
{{--                <label>* Биография:</label>--}}
{{--                <input name="bio" type="text" placeholder="Введите биографию" required>--}}
{{--            </div>--}}

{{--            <button class="btn" type="submit">Добавить актёра</button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--@endsection--}}

@extends('layouts.layout')

@section('title', 'Добавление режиссёра')

@section('content')
    <div class="container">
        <div class="action-buttons">
            <a class="btn btn-back" href="/actors">
                <i class="icon-arrow-right"></i> Вернуться к списку
            </a>
        </div>

        <div class="form-card">
            <form action="{{ route('directors.store') }}" method="POST" enctype="multipart/form-data">
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
                            <button type="submit" class="btn btn-primary">Добавить актёра</button>
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
