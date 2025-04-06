@extends('layouts.layout')

@section('title', 'Добавление студии')

@section('content')
    <a class="btn" href="/studios">Вернуться к списку</a>

    <form class="flex border" action="{{ route('studios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")
            </script>
        @endif

        <div>
            <p>* - Обязательное поле</p>
            <div>
                @error('name')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Название студии:</label>
                <input name="name" type="text" placeholder="Введите название" required>
            </div>

            <button class="btn" type="submit">Добавить студию</button>
        </div>
    </form>
@endsection
