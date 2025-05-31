@extends('layouts.layout')

@section('title', 'Добавление медиа')

@section('content')
    <div class="container">
        <div class="action-buttons">
            <a class="btn btn-back" href="/media">
                <i class="icon-arrow-right"></i> Вернуться к списку
            </a>
        </div>

        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Добавление нового медиа</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <h3>Ошибка валидации данных</h3>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-notes">
                        <p><small>* - Обязательное поле</small></p>
                    </div>

                    <div class="form-grid">
                        <div class="form-column">
                            <div class="form-group">
                                <label class="form-label" for="preview">* Превью:</label>
                                <div class="file-upload">
                                    <input type="file" id="fileInput" name="preview" class="file-input" required>
                                    <label for="fileInput" class="file-button">Обзор</label>
                                </div>
                                <span class="file-name-display">
                                    <span id="currentFileName">{{ 'Файл не выбран' }}</span>
                                </span>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="name">* Имя:</label>
                                <input class="form-input"
                                       name="name"
                                       id="name"
                                       type="text"
                                       placeholder="Введите название медиа"
                                       required
                                       value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="description">* Описание:</label>
                                <textarea class="form-input"
                                          name="description"
                                          id="description"
                                          rows="3"
                                          placeholder="Введите описание"
                                          required>{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="type">* Тип медиа:</label>
                                <select class="form-select" name="type" id="type" required>
                                    <option value="0" {{ old('type') == '0' ? 'selected' : '' }}>Фильм</option>
                                    <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>Сериал</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-column">
                            <div class="form-group">
                                <label class="form-label" for="studio_id">* Студия:</label>
                                <select class="form-select" name="studio_id" id="studio_id" required>
                                    @foreach($studios as $studio)
                                        <option value="{{ $studio->id }}" {{ old('studio_id') == $studio->id ? 'selected' : '' }}>
                                            {{ $studio->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="age_rating_id">* Возрастной рейтинг:</label>
                                <select class="form-select" name="age_rating_id" id="age_rating_id" required>
                                    @foreach($ageRatings as $ageRating)
                                        <option value="{{ $ageRating->id }}" {{ old('age_rating_id') == $ageRating->id ? 'selected' : '' }}>
                                            {{ $ageRating->age }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="duration">* Продолжительность (мин.):</label>
                                <input class="form-input"
                                       name="duration"
                                       id="duration"
                                       type="number"
                                       placeholder="Введите продолжительность"
                                       min="1"
                                       required
                                       value="{{ old('duration') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="release">* Дата выхода:</label>
                                <input class="form-input"
                                       name="release"
                                       id="release"
                                       type="date"
                                       required
                                       value="{{ old('release') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="rating">* Рейтинг (0-10):</label>
                                <input class="form-input"
                                       name="rating"
                                       id="rating"
                                       type="number"
                                       placeholder="Введите рейтинг"
                                       min="0"
                                       max="10"
                                       step="0.1"
                                       required
                                       value="{{ old('rating') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="episodes">* Кол-во серий:</label>
                                <input class="form-input"
                                       name="episodes"
                                       id="episodes"
                                       type="number"
                                       placeholder="Введите кол-во серий"
                                       min="1"
                                       required
                                       value="{{ old('episodes') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="contentURL">* Ссылка на контент:</label>
                                <input class="form-input"
                                       name="contentURL"
                                       id="contentURL"
                                       type="text"
                                       placeholder="Введите ссылку"
                                       required
                                       value="{{ old('contentURL') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <button class="btn btn-primary" type="submit">
                            <i class="icon-plus"></i> Добавить медиа
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('fileInput');
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
@endsection
