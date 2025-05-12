{{--@extends('layouts.layout')--}}

{{--@section('title', 'Просмотр пользователя')--}}

{{--@section('content')--}}
{{--    <a class="btn" href="/users">Вернуться к списку</a>--}}
{{--    <a class="btn" href="/users/edit/{{$user->id}}">Редактировать пользователя</a>--}}
{{--    <a class="btn" href="/users/delete/{{$user->id}}">Удалить пользователя</a>--}}

{{--    <div class="flex border">--}}
{{--        <div class="flex">--}}
{{--            <img class="big-photo" src="{{ Str::startsWith($user->avatar, 'assets/') ? asset($user->avatar) : asset('storage/' . $user->avatar) }}" alt="Аватар"/>--}}
{{--            <div class="media-info">--}}
{{--                <div>Роль: {{ $user->role->name }}</div>--}}
{{--                <div>Фамилия: {{ $user->surname }}</div>--}}
{{--                <div>Имя: {{ $user->name }}</div>--}}
{{--                <div>Email: {{ $user->email }}</div>--}}
{{--                <div>Дата рождения: {{ $user->birthday }}</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

@extends('layouts.layout')

@section('title', 'Просмотр пользователя')

@section('content')
    <div class="action-buttons">
        <a href="/users" class="btn btn-outline">
            ← Вернуться к списку
        </a>
        <a href="/users/edit/{{$user->id}}" class="btn btn-primary btn-icon btn-icon-edit">
            Редактировать
        </a>
        <a href="/users/delete/{{$user->id}}" class="btn btn-danger">
            Удалить
        </a>
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
@endsection
