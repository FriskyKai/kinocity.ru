@extends('layouts.layout')

@section('title', 'Редактирование студии')

@section('content')
    <div class="container">
        <div class="action-buttons">
            <a href="/studios">
                <button class="btn btn-back">
                    <i class="icon-arrow-right"></i> Вернуться к списку
                </button>
            </a>
            <a href="/studios/show/{{$studio->id}}">
                <button class="btn btn-back">
                    <i class="btn-icon-view"></i> Просмотр студии
                </button>
            </a>
        </div>

        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Редактирование студии</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('studios.update', $studio->id) }}" method="POST">
                    @csrf

                    @if($errors->any())
                        <div class="alert alert-error">
                            <h3>Ошибка валидации данных</h3>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label class="form-label" for="name">Название студии</label>
                        <input class="form-input"
                               name="name"
                               id="name"
                               type="text"
                               placeholder="Например: Фантастика"
                               value="{{ old('name', $studio->name) }}"
                               required>
                        @error('name')
                        <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="icon-save"></i> Сохранить изменения
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
