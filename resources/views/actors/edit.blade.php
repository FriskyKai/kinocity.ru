@extends('layouts.layout')

@section('title', 'Редактирование актёра')

@section('content')
    <a class="btn" href="/actors">Вернуться к списку</a>
    <a class="btn" href="/actors/show/{{$actor->id}}">Вернуться к актёру</a>

    <form class="flex border" action="{{ route('actors.update', $actor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")
            </script>
        @endif

        <div>
            <img src="{{ asset('storage/' . $actor->photo) }}" alt="Фото" width="75"/>
            <div>
                @error('photo')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>Фото:</label>
                <input name="photo" type="file">
            </div>
            <div>
                @error('surname')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>Фамилия:</label>
                <input name="surname" type="text" placeholder="Введите фамилию" value="{{ $actor->surname }}">
            </div>
            <div>
                @error('name')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>Имя:</label>
                <input name="name" type="text" placeholder="Введите имя" value="{{ $actor->name }}">
            </div>
            <div>
                @error('birthday')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>Дата рождения:</label>
                <input name="birthday" type="date" value="{{ $actor->birthday }}">
            </div>
            <div>
                @error('bio')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>Биография:</label>
                <input name="bio" type="text" placeholder="Введите биографию" value="{{ $actor->bio }}">
            </div>

            <button class="btn" type="submit">Обновить актёра</button>
        </div>
    </form>
@endsection
