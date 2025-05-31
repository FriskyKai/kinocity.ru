{{--@extends('layouts.layout')--}}

{{--@section('title', 'Добавление кадра')--}}

{{--@section('content')--}}
{{--    <a class="btn" href="/media/show/{{$media->id}}">Вернуться к медиа</a>--}}

{{--    <form class="flex border" action="{{ route('footages.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        @if($errors->any())--}}
{{--            <script>--}}
{{--                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")--}}
{{--            </script>--}}
{{--        @endif--}}

{{--        <div>--}}
{{--            <p>* - Обязательное поле</p>--}}
{{--            <input type="hidden" name="media_id" value="{{ $media->id }}">--}}
{{--            <div>--}}
{{--                @error('photo')--}}
{{--                    <p class="warning">{{ $message }}</p>--}}
{{--                @enderror--}}
{{--                <label>* Загрузите кадр:</label>--}}
{{--                <div class="file-upload">--}}
{{--                    <input type="file" id="fileInput" name="photo" class="file-input" required>--}}
{{--                    <label for="fileInput" class="file-button">Обзор</label>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <button class="btn" type="submit">Добавить кадр</button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--@endsection--}}

@extends('layouts.layout')

@section('title', 'Добавление кадра')

@section('content')
    <div class="container">
        <div class="action-buttons">
            <a href="/media/show/{{$media->id}}">
                <button class="btn btn-back">
                    <i class="btn-icon-view"></i> Просмотр медиа
                </button>
            </a>
        </div>

        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Добавление кадра медиа</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('footages.store', $media) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="media_id" value="{{ $media->id }}">

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
                                <div class="form-group">
                                    <label class="form-label" for="preview">* Кадр:</label>
                                    <div class="file-upload">
                                        <input type="file" id="fileInput" name="photo" class="file-input" required>
                                        <label for="fileInput" class="file-button">Обзор</label>
                                    </div>
                                    <span class="file-name-display">
                                    <span id="currentFileName">{{ 'Файл не выбран' }}</span>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-footer">
                        <button class="btn btn-primary" type="submit">
                            <i class="btn-icon-edit"></i> Добавить кадр
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
