@extends('layouts.layout')

@section('title', 'Список актёров')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="h-title">Актёры</h1>
            <a href="{{ route('actors.create') }}" class="btn btn-primary">
                <i class="icon-plus"></i> Добавить актёра
            </a>
        </div>

        <!-- Форма поиска -->
        <div class="search-container" style="margin-bottom: 20px;">
            <form action="{{ route('actors.index') }}" method="GET">
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
                        <a href="{{ route('actors.index') }}" class="search-clear">X Сбросить
                        </a>
                    @endif
                </div>
            </form>
        </div>

        @if($actors->isEmpty())
            <p class="no-results">Актёры не найдены.</p>
        @else
            <div class="cards-grid">
                @foreach($actors as $actor)
                    <a href="/actors/show/{{$actor->id}}" class="user-card">
                        <div class="card-avatar-container">
                            <img class="card-avatar" src="{{ Str::startsWith($actor->photo, 'assets/') ? asset($actor->photo) : asset('storage/' . $actor->photo) }}" alt="Фото"/>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">{{ $actor->name }} {{ $actor->surname }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection
