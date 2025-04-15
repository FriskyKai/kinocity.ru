@extends('layouts.layout')

@section('title', 'Список пользователей')

@section('content')
    <a class="btn" href="{{ route('users.create') }}">Добавить пользователя</a>

    @foreach($users as $user)
        <a href="/users/show/{{$user->id}}">
            <div class="flex border">
                <div class="flex">
                    <img class="small-photo" src="{{ Str::startsWith($user->avatar, 'assets/') ? asset($user->avatar) : asset('storage/' . $user->avatar) }}" alt="Аватар"/>
                    <div class="media-info">
                        <div>Фамилия: {{ $user->surname }}</div>
                        <div>Имя: {{ $user->name }}</div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
@endsection
