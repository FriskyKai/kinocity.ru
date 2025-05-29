{{--@extends('layouts.layout')--}}

{{--@section('title', 'Редактирование режиссёра')--}}

{{--@section('content')--}}
{{--    <a class="btn" href="/directors">Вернуться к списку</a>--}}
{{--    <a class="btn" href="/directors/show/{{$director->id}}">Вернуться к режиссёру</a>--}}

{{--    <form class="flex border" action="{{ route('directors.update', $director->id) }}" method="POST" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        @if($errors->any())--}}
{{--            <script>--}}
{{--                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")--}}
{{--            </script>--}}
{{--        @endif--}}

{{--        <div class="flex">--}}
{{--            <img class="big-photo" src="{{ Str::startsWith($director->photo, 'assets/') ? asset($director->photo) : asset('storage/' . $director->photo) }}" alt="Фото"/>--}}
{{--            <div class="media-info">--}}
{{--                <div>--}}
{{--                    @error('photo')--}}
{{--                    <p class="warning">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                    <label>Фото:</label>--}}
{{--                    <div class="file-upload">--}}
{{--                        <input type="file" id="fileInput" name="photo" class="file-input">--}}
{{--                        <label for="fileInput" class="file-button">Обзор</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    @error('surname')--}}
{{--                    <p class="warning">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                    <label>Фамилия:</label>--}}
{{--                    <input name="surname" type="text" placeholder="Введите фамилию" value="{{ $director->surname }}">--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    @error('name')--}}
{{--                    <p class="warning">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                    <label>Имя:</label>--}}
{{--                    <input name="name" type="text" placeholder="Введите имя" value="{{ $director->name }}">--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    @error('birthday')--}}
{{--                    <p class="warning">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                    <label>Дата рождения:</label>--}}
{{--                    <input name="birthday" type="date" value="{{ $director->birthday }}">--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    @error('bio')--}}
{{--                    <p class="warning">{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                    <label>Биография:</label>--}}
{{--                    <input name="bio" type="text" placeholder="Введите биографию" value="{{ $director->bio }}">--}}
{{--                </div>--}}

{{--                <button class="btn" type="submit">Обновить режиссёра</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--@endsection--}}

@extends('layouts.layout')

@section('title', 'Редактирование режиссёра')

@section('content')
    <div class="container">
        <div class="action-buttons">
            <a href="/directors">
                <button class="btn btn-back">
                    <i class="icon-arrow-right"></i> Вернуться к списку
                </button>
            </a>
            <a href="/directors/show/{{$director->id}}">
                <button class="btn btn-back">
                    <i class="btn-icon-view"></i> Просмотр режиссёра
                </button>
            </a>
        </div>

        <div class="form-card">
            <form action="{{ route('directors.update', $director->id) }}" method="POST" enctype="multipart/form-data">
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
                            <img src="{{ Str::startsWith($director->photo, 'assets/') ? asset($director->photo) : asset('storage/' . $director->photo) }}"
                                 alt="Текущий аватар"
                                 class="avatar-image"/>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Фотография</label>
                            <div class="file-upload-wrapper">
                                <input type="file" id="avatarUpload" name="photo" class="file-input @error('photo') is-invalid @enderror">
                                <label for="avatarUpload" class="file-button">Выбрать файл</label>
                                <span class="file-name-display">
                                <span id="currentFileName">{{ basename($director->photo) ?? 'Файл не выбран' }}</span>
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
                                   value="{{ old('surname', $director->surname) }}">
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
                                   value="{{ old('name', $director->name) }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Дата рождения</label>
                            <input type="date"
                                   name="birthday"
                                   class="form-control @error('birthday') is-invalid @enderror"
                                   value="{{ old('birthday', $director->birthday) }}">
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
                                   value="{{ old('bio', $director->bio) }}">
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
