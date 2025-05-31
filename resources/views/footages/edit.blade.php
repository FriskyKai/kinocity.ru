@extends('layouts.layout')

@section('title', 'Редактирование кадра')

@section('content')
    <div class="container">
        <div class="action-buttons">
            <a href="/media/show/{{$media->id}}">
                <button class="btn btn-back">
                    <i class="btn-icon-view"></i> Просмотр медиа
                </button>
            </a>
            <a href="/footages/show/{{$footage->id}}">
                <button class="btn btn-back">
                    <i class="btn-icon-view"></i> Просмотр кадра
                </button>
            </a>
        </div>

        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Редактирование кадра медиа</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('footages.update', $footage, $media) }}" method="POST" enctype="multipart/form-data">
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
                                         src="{{ Str::startsWith($footage->photo, 'assets/') ? asset($footage->photo) : asset('storage/' . $footage->photo) }}"
                                         alt="Кадр {{ $footage->photo }}"
                                         onerror="this.src='{{ asset('assets/default-media.jpg') }}'">
                                </div>
                                <label class="form-label" for="preview">Кадр:</label>
                                <div class="file-upload">
                                    <input type="file" id="fileInput" name="photo" class="file-input">
                                    <label for="fileInput" class="file-button">Обзор</label>
                                </div>
                                <span class="file-name-display">
                                    <span id="currentFileName">{{ basename($footage->photo) ?? 'Файл не выбран' }}</span>
                                    <span id="newFileName"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <button class="btn btn-primary" type="submit">
                            <i class="btn-icon-edit"></i> Изменить кадр
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
