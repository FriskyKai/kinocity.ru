@extends('layouts.layout')

@section('title', 'Добавление студии')

@section('content')
    <div class="container">
        <a class="btn btn-back" href="/studios">
            <i class="icon-arrow-left"></i> Вернуться к списку
        </a>

        <h1 class="form-title">Добавление новой студии</h1>

        <form class="form-card" action="{{ route('studios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if($errors->any())
                <div class="alert alert-error">
                    Ошибка валидации данных. Пожалуйста, исправьте указанные ошибки.
                </div>
            @endif

            <div class="form-notes">
                <p>* - Обязательное поле</p>
            </div>

            <div class="form-group">
                <label class="form-label" for="name">
                    * Название студии:
                </label>
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
                <input class="form-input"
                       name="name"
                       id="name"
                       type="text"
                       placeholder="Введите название"
                       required
                       value="{{ old('name') }}">
            </div>

            <button class="btn btn-submit" type="submit">Добавить студию</button>
        </form>
    </div>
@endsection
