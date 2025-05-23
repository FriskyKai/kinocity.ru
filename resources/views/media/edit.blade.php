@extends('layouts.layout')

@section('title', 'Редактирование медиа')

@section('content')
    <a class="btn" href="/media">Вернуться к списку</a>
    <a class="btn" href="/media/show/{{$media->id}}">Вернуться к медиа</a>

    <form class="flex border" action="{{ route('media.update', $media->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")
            </script>
        @endif

        <div class="flex">
            <img class="big-photo" src="{{ Str::startsWith($media->preview, 'assets/') ? asset($media->preview) : asset('storage/' . $media->preview) }}" alt="Превью"/>
            <div class="media-info">
                <div>
                    @error('preview')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Превью:</label>
                    <div class="file-upload">
                        <input type="file" id="fileInput" name="preview" class="file-input">
                        <label for="fileInput" class="file-button">Обзор</label>
                    </div>
                </div>
                <div>
                    @error('name')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Имя:</label>
                    <input name="name" type="text" placeholder="Введите имя" value="{{ $media->name }}">
                </div>
                <div>
                    @error('description')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Описание:</label>
                    <input name="description" type="text" placeholder="Введите описание" value="{{ $media->description }}">
                </div>
                <div>
                    @error('type')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Тип медиа:</label>
                    <select name="type">
                        <option value="0" {{ $media->type == 0 ? 'selected' : '' }}>Фильм</option>
                        <option value="1" {{ $media->type == 1 ? 'selected' : '' }}>Сериал</option>
                    </select>
                </div>
                <div>
                    @error('studio_id')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Студия:</label>
                    <select name="studio_id">
                        @foreach($studios as $studio)
                            <option value="{{ $studio->id }}" {{ $media->studio_id == $studio->id ? 'selected' : '' }}>
                                {{ $studio->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    @error('age_rating_id')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Возр.рейтинг:</label>
                    <select name="age_rating_id">
                        @foreach($ageRatings as $ageRating)
                            <option value="{{ $ageRating->id }}" {{ $media->age_rating_id == $ageRating->id ? 'selected' : '' }}>
                                {{ $ageRating->age }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    @error('duration')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Продолжительность (мин.):</label>
                    <input name="duration" type="number" placeholder="Введите продолжительность" value="{{ $media->duration }}">
                </div>
                <div>
                    @error('release')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Дата выхода:</label>
                    <input name="release" type="date" value="{{ $media->release }}">
                </div>
                <div>
                    @error('rating')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Рейтинг:</label>
                    <input name="rating" type="number" placeholder="Введите рейтинг" min="0" max="10" step="0.1" value="{{ $media->rating }}">
                </div>
                <div>
                    @error('episodes')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Кол-во серий (Пустое или 1 - если фильм):</label>
                    <input name="episodes" type="number" placeholder="Введите кол-во серий" min="1" value="{{ $media->episodes == '' ? '1' : $media->episodes}}">
                </div>
                <div>
                    @error('contentURL')
                        <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Ссылка на контент:</label>
                    <input name="contentURL" type="text" placeholder="Введите ссылку" required value="{{ $media->contentURL }}">
                </div>

                <button class="btn" type="submit">Обновить медиа</button>
            </div>



        </div>
    </form>
@endsection
