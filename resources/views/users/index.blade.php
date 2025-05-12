{{--@extends('layouts.layout')--}}

{{--@section('title', 'Список пользователей')--}}

{{--@section('content')--}}
{{--    <a class="btn" href="{{ route('users.create') }}">Добавить пользователя</a>--}}

{{--    @foreach($users as $user)--}}
{{--        <a href="/users/show/{{$user->id}}">--}}
{{--            <div class="flex border">--}}
{{--                <div class="flex">--}}
{{--                    <img class="small-photo" src="{{ Str::startsWith($user->avatar, 'assets/') ? asset($user->avatar) : asset('storage/' . $user->avatar) }}" alt="Аватар"/>--}}
{{--                    <div class="media-info">--}}
{{--                        <div>Фамилия: {{ $user->surname }}</div>--}}
{{--                        <div>Имя: {{ $user->name }}</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </a>--}}
{{--    @endforeach--}}
{{--@endsection--}}

@extends('layouts.layout')

@section('title', 'Список пользователей')

@section('content')
    <div class="action-buttons">
        <a class="btn btn-primary btn-icon" href="{{ route('users.create') }}">Добавить пользователя</a>
    </div>

    <div class="cards-grid">
        @foreach($users as $user)
            <a href="/users/show/{{$user->id}}" class="user-card">
                <div class="card-avatar-container">
                    <img class="card-avatar" src="{{ Str::startsWith($user->avatar, 'assets/') ? asset($user->avatar) : asset('storage/' . $user->avatar) }}" alt="Аватар"/>
                </div>
                <div class="card-content">
                    <h3 class="card-title">{{ $user->surname }} {{ $user->name }}</h3>
                    <p class="card-text">{{ $user->email }}</p>
                    <span class="card-badge">{{ $user->role->name }}</span>
                </div>
            </a>
        @endforeach
    </div>
@endsection
