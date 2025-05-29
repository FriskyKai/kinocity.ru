{{--@extends('layouts.layout')--}}

{{--@section('title', 'Просмотр жанра')--}}

{{--@section('content')--}}
{{--    <a class="btn" href="/genres">Вернуться к списку</a>--}}
{{--    <a class="btn" href="/genres/edit/{{$genre->id}}">Редактировать жанр</a>--}}
{{--    <a class="btn" href="/genres/delete/{{$genre->id}}">Удалить жанр</a>--}}

{{--    <div class="flex border">--}}
{{--        <div>--}}
{{--            <div>Название жанра: {{ $genre->name }}</div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

@extends('layouts.layout')

@section('title', 'Просмотр жанра')

@section('content')
    <div class="container">
        <div>
            <div class="action-buttons">
                <a class="btn btn-back" href="/genres">
                    <i class="icon-arrow-left"></i> Вернуться к списку
                </a>
                <a href="/genres/edit/{{$genre->id}}">
                    <button class="btn">
                        <i class="btn-icon-edit"></i> Редактировать
                    </button>
                </a>
                <form method="GET" action="{{ route('genres.destroy', $genre->id) }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn" onclick="return confirm('Вы уверены, что хотите удалить этот жанр?')">
                        <i class="btn-icon-delete"></i> Удалить
                    </button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h1 class="card-title">{{ $genre->name }}</h1>
            </div>
            <div class="card-body">
                <div class="detail-grid">
                    <div class="detail-item">
                        <span class="detail-label">ID жанра:</span>
                        <span class="detail-value">{{ $genre->id }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Название:</span>
                        <span class="detail-value">{{ $genre->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
