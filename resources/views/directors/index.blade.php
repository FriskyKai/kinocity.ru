@extends('layouts.layout')

@section('title', 'Список режиссёров')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="h-title">Режиссёры</h1>
            <a href="{{ route('directors.create') }}" class="btn btn-primary">
                <i class="icon-plus"></i> Добавить режиссёра
            </a>
        </div>

        <!-- Форма поиска -->
        <div class="search-container" style="margin-bottom: 20px;">
            <form action="{{ route('directors.index') }}" method="GET">
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
                        <a href="{{ route('directors.index') }}" class="search-clear">X Сбросить
                        </a>
                    @endif
                </div>
            </form>
        </div>

        @if($directors->isEmpty())
            <p class="no-results">Режиссёры не найдены.</p>
        @else
            <div class="cards-grid">
                @foreach($directors as $director)
                    <a href="/directors/show/{{$director->id}}" class="user-card">
                        <div class="card-avatar-container">
                            <img class="card-avatar" src="{{ Str::startsWith($director->photo, 'assets/') ? asset($director->photo) : asset('storage/' . $director->photo) }}" alt="Фото"/>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">{{ $director->name }} {{ $director->surname }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection
