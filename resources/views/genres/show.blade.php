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
