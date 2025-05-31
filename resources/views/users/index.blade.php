@extends('layouts.layout')

@section('title', 'Список пользователей')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="h-title">Пользователи</h1>
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="icon-plus"></i> Добавить пользователя
            </a>
        </div>

        <!-- Форма поиска -->
        <div class="search-container" style="margin-bottom: 20px;">
            <form action="{{ route('users.index') }}" method="GET">
                <div class="search-input-group">
                    <input type="text"
                           name="search"
                           placeholder="Поиск по фамилии/имени..."
                           value="{{ request('search') }}"
                           class="search-input">
                    <button type="submit" class="search-button">
                        <i class="icon-search"></i> Найти
                    </button>
                    @if(request()->has('search'))
                        <a href="{{ route('users.index') }}" class="search-clear">X Сбросить
                        </a>
                    @endif
                </div>
            </form>
        </div>

        @if($users->isEmpty())
            <p class="no-results">Пользователи не найдены.</p>
        @else
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
        @endif
    </div>
@endsection
