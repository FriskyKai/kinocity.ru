@extends('layouts.layout')

@section('title', 'Редактирование медиа')

@section('content')
    <div class="container">
        <div class="action-buttons">
            <a href="/media">
                <button class="btn btn-back">
                    <i class="icon-arrow-right"></i> Вернуться к списку
                </button>
            </a>
            <a href="/media/show/{{$media->id}}">
                <button class="btn btn-back">
                    <i class="btn-icon-view"></i> Просмотр медиа
                </button>
            </a>
        </div>

        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Редактирование медиа</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('media.update', $media) }}" method="POST" enctype="multipart/form-data">
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

                    <div class="form-grid">
                        <div class="form-column">
                            <div class="form-group">
                                <div class="form-preview-section">
                                    <img class="media-edit-preview"
                                         src="{{ Str::startsWith($media->preview, 'assets/') ? asset($media->preview) : asset('storage/' . $media->preview) }}"
                                         alt="Превью {{ $media->name }}"
                                         onerror="this.src='{{ asset('assets/default-media.jpg') }}'">
                                </div>
                                <label class="form-label" for="preview">Превью:</label>
                                <div class="file-upload">
                                    <input type="file" id="fileInput" name="preview" class="file-input">
                                    <label for="fileInput" class="file-button">Обзор</label>
                                </div>
                                <span class="file-name-display">
                                    <span id="currentFileName">{{ basename($media->preview) ?? 'Файл не выбран' }}</span>
                                    <span id="newFileName"></span>
                                </span>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="name">Имя:</label>
                                <input class="form-input"
                                       name="name"
                                       id="name"
                                       type="text"
                                       placeholder="Введите название медиа"
                                       value="{{ $media->name }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="description">Описание:</label>
                                <textarea class="form-input"
                                          name="description"
                                          id="description"
                                          rows="3"
                                          placeholder="Введите описание">{{ $media->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="type">Тип медиа:</label>
                                <select class="form-select" name="type" id="type">
                                    <option value="0" {{ $media->type == '0' ? 'selected' : '' }}>Фильм</option>
                                    <option value="1" {{ $media->type == '1' ? 'selected' : '' }}>Сериал</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-column">
                            <div class="form-group">
                                <label class="form-label" for="studio_id">Студия:</label>
                                <select class="form-select" name="studio_id" id="studio_id">
                                    @foreach($studios as $studio)
                                        <option value="{{ $studio->id }}" {{ $media->studio_id == $studio->id ? 'selected' : '' }}>
                                            {{ $studio->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="age_rating_id">Возрастной рейтинг:</label>
                                <select class="form-select" name="age_rating_id" id="age_rating_id">
                                    @foreach($ageRatings as $ageRating)
                                        <option value="{{ $ageRating->id }}" {{ $media->age_rating_id == $ageRating->id ? 'selected' : '' }}>
                                            {{ $ageRating->age }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="duration">Продолжительность (мин.):</label>
                                <input class="form-input"
                                       name="duration"
                                       id="duration"
                                       type="number"
                                       placeholder="Введите продолжительность"
                                       min="1"
                                       value="{{ $media->duration }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="release">Дата выхода:</label>
                                <input class="form-input"
                                       name="release"
                                       id="release"
                                       type="date"
                                       value="{{ $media->release }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="rating">Рейтинг (0-10):</label>
                                <input class="form-input"
                                       name="rating"
                                       id="rating"
                                       type="number"
                                       placeholder="Введите рейтинг"
                                       min="0"
                                       max="10"
                                       step="0.1"
                                       value="{{ $media->rating }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="episodes">Кол-во серий:</label>
                                <input class="form-input"
                                       name="episodes"
                                       id="episodes"
                                       type="number"
                                       placeholder="Введите кол-во серий"
                                       min="1"
                                       value="{{ $media->episodes }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="contentURL">Ссылка на контент:</label>
                                <input class="form-input"
                                       name="contentURL"
                                       id="contentURL"
                                       type="text"
                                       placeholder="Введите ссылку"
                                       value="{{ $media->contentURL }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <button class="btn btn-primary" type="submit">
                            <i class="btn-icon-edit"></i> Изменить медиа
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
