@extends('layouts.layout')

@section('title', 'Просмотр пользователя')

@section('content')
    <a class="btn" href="/users">Вернуться к списку</a>
    <a class="btn" href="/users/edit/{{$user->id}}">Редактировать пользователя</a>
    <a class="btn" href="/users/delete/{{$user->id}}">Удалить пользователя</a>

    <div class="flex border">
        <div class="flex">
            <img class="big-photo" src="{{ Str::startsWith($user->avatar, 'assets/') ? asset($user->avatar) : asset('storage/' . $user->avatar) }}" alt="Аватар"/>
            <div class="media-info">
                <div>Роль: {{ $user->role->name }}</div>
                <div>Фамилия: {{ $user->surname }}</div>
                <div>Имя: {{ $user->name }}</div>
                <div>Email: {{ $user->email }}</div>
                <div>Дата рождения: {{ $user->birthday }}</div>
            </div>
        </div>
    </div>
@endsection
