@extends('layouts.layout')

@section('title', 'Просмотр пользователя')

@section('content')
    <div class="container">
        <div>
            <div class="action-buttons">
                <a class="btn btn-back" href="/users">
                    <i class="icon-arrow-left"></i> Вернуться к списку
                </a>
                <a href="/users/edit/{{$user->id}}">
                    <button class="btn">
                        <i class="btn-icon-edit"></i> Редактировать
                    </button>
                </a>
                <form method="GET" action="{{ route('users.destroy', $user->id) }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn" onclick="return confirm('Вы уверены, что хотите удалить этого пользователя?')">
                        <i class="btn-icon-delete"></i> Удалить
                    </button>
                </form>
            </div>
        </div>

        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar-container">
                    <img class="profile-avatar"
                         src="{{ Str::startsWith($user->avatar, 'assets/') ? asset($user->avatar) : asset('storage/' . $user->avatar) }}"
                         alt="Аватар пользователя"/>
                </div>
                <div class="profile-title">
                    <h1>{{ $user->surname }} {{ $user->name }}</h1>
                    <span class="profile-badge">{{ $user->role->name }}</span>
                </div>
            </div>

            <div class="profile-details">
                <div class="detail-item">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value">{{ $user->email }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Дата рождения:</span>
                    <span class="detail-value">{{ $user->birthday }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Зарегистрирован:</span>
                    <span class="detail-value">{{ $user->created_at->format('d.m.Y') }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
