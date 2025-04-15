@extends('layouts.layout')

@section('title', 'Добавление медиа')

@section('content')
    <a class="btn" href="/media">Вернуться к списку</a>

    <form class="flex border" action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")
            </script>
        @endif

        <div>
            <p>* - Обязательное поле</p>
            <div>
                @error('preview')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Превью:</label>
                <input name="preview" type="file">
            </div>
            <div>
                @error('name')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Имя:</label>
                <input name="name" type="text" placeholder="Введите имя" required>
            </div>
            <div>
                @error('description')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Описание:</label>
                <input name="description" type="text" placeholder="Введите описание" required>
            </div>
            <div>
                @error('type')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Тип медиа:</label>
                <select name="type" required>
                    <option value="0" selected>Фильм</option>
                    <option value="1">Сериал</option>
                </select>
            </div>
            <div>
                @error('studio_id')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Студия:</label>
                <select name="studio_id" required>
                    @foreach($studios as $studio)
                        <option value="{{ $studio->id }}">{{ $studio->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                @error('age_rating_id')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Возр.рейтинг:</label>
                <select name="age_rating_id" required>
                    @foreach($ageRatings as $ageRating)
                        <option value="{{ $ageRating->id }}">{{ $ageRating->age }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                @error('duration')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Продолжительность (мин.):</label>
                <input name="duration" type="number" placeholder="Введите продолжительность" required>
            </div>
            <div>
                @error('release')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Дата выхода:</label>
                <input name="release" type="date" required>
            </div>
            <div>
                @error('rating')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Рейтинг:</label>
                <input name="rating" type="number" placeholder="Введите рейтинг" min="0" max="10" step="0.01" required>
            </div>
            <div>
                @error('episodes')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Кол-во серий (1 - если фильм):</label>
                <input name="episodes" type="number" placeholder="Введите кол-во серий" min="1" required>
            </div>
            <div>
                @error('contentURL')
                <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Ссылка на контент:</label>
                <input name="contentURL" type="text" placeholder="Введите ссылку" required>
            </div>

            <button class="btn" type="submit">Добавить медиа</button>
        </div>
    </form>
@endsection
