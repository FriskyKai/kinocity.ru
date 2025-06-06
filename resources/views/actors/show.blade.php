@extends('layouts.layout')

@section('title', 'Просмотр актёра')

@section('content')
    <div class="container">
        <div>
            <div class="action-buttons">
                <a class="btn btn-back" href="/actors">
                    <i class="icon-arrow-left"></i> Вернуться к списку
                </a>
                <a href="/actors/edit/{{$actor->id}}">
                    <button class="btn">
                        <i class="btn-icon-edit"></i> Редактировать
                    </button>
                </a>
                <form method="GET" action="{{ route('actors.destroy', $actor->id) }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn" onclick="return confirm('Вы уверены, что хотите удалить этого актёра?')">
                        <i class="btn-icon-delete"></i> Удалить
                    </button>
                </form>
            </div>
        </div>

        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar-container">
                    <img class="profile-avatar"
                         src="{{ Str::startsWith($actor->photo, 'assets/') ? asset($actor->photo) : asset('storage/' . $actor->photo) }}"
                         alt="Фотография актёра"/>
                </div>
                <div class="profile-title">
                    <h1>{{ $actor->name }} {{ $actor->surname }}</h1>
                </div>
            </div>

            <div class="profile-details">
                <div class="detail-item">
                    <span class="detail-label">Дата рождения:</span>
                    <span class="detail-value">{{ $actor->birthday }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Биография:</span>
                    <span class="detail-value">{{ $actor->bio }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
