@extends('layouts.layout')

@section('title', 'Просмотр пользователя')

@section('content')
    <a class="btn" href="/users">Вернуться к списку</a>
    <a class="btn" href="/users/edit/{{$user->id}}">Редактировать пользователя</a>

    <div class="flex border">
        <div>
            <img src="{{ asset('storage/' . $user->avatar) }}" alt="Аватар" width="75"/>
            <div>Роль: {{ $user->role->name }}</div>
            <div>Фамилия: {{ $user->surname }}</div>
            <div>Имя: {{ $user->name }}</div>
            <div>Email: {{ $user->email }}</div>
            <div>Дата рождения: {{ $user->birthday }}</div>
        </div>
    </div>
@endsection
