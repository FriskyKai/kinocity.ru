@extends('layouts.layout')

@section('title', 'Редактирование режиссёра')

@section('content')
    <a class="btn" href="/directors">Вернуться к списку</a>
    <a class="btn" href="/directors/show/{{$director->id}}">Вернуться к режиссёру</a>

    <form class="flex border" action="{{ route('directors.update', $director->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")
            </script>
        @endif

        <div class="flex">
            <img class="big-photo" src="{{ Str::startsWith($director->photo, 'assets/') ? asset($director->photo) : asset('storage/' . $director->photo) }}" alt="Фото"/>
            <div class="media-info">
                <div>
                    @error('photo')
                    <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Фото:</label>
                    <div class="file-upload">
                        <input type="file" id="fileInput" name="photo" class="file-input">
                        <label for="fileInput" class="file-button">Обзор</label>
                    </div>
                </div>
                <div>
                    @error('surname')
                    <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Фамилия:</label>
                    <input name="surname" type="text" placeholder="Введите фамилию" value="{{ $director->surname }}">
                </div>
                <div>
                    @error('name')
                    <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Имя:</label>
                    <input name="name" type="text" placeholder="Введите имя" value="{{ $director->name }}">
                </div>
                <div>
                    @error('birthday')
                    <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Дата рождения:</label>
                    <input name="birthday" type="date" value="{{ $director->birthday }}">
                </div>
                <div>
                    @error('bio')
                    <p class="warning">{{ $message }}</p>
                    @enderror
                    <label>Биография:</label>
                    <input name="bio" type="text" placeholder="Введите биографию" value="{{ $director->bio }}">
                </div>

                <button class="btn" type="submit">Обновить режиссёра</button>
            </div>
        </div>
    </form>
@endsection
