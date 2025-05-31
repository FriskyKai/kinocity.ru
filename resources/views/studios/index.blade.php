@extends('layouts.layout')

@section('title', 'Список студий')


@section('content')
    <div class="container">
        <div class="studios-header">
            <h1 class="studios-title">Студии</h1>
            <a href="{{ route('studios.create') }}" class="btn btn-primary">
                <i class="icon-plus"></i> Добавить студию
            </a>
        </div>

        <!-- Форма поиска -->
        <div class="search-container" style="margin-bottom: 20px;">
            <form action="{{ route('studios.index') }}" method="GET">
                <div class="search-input-group">
                    <input type="text"
                           name="search"
                           placeholder="Поиск по названию..."
                           value="{{ request('search') }}"
                           class="search-input">
                    <button type="submit" class="search-button">
                        <i class="icon-search"></i> Найти
                    </button>
                    @if(request()->has('search'))
                        <a href="{{ route('studios.index') }}" class="search-clear">X Сбросить
                        </a>
                    @endif
                </div>
            </form>
        </div>

        @if($studios->isEmpty())
            <p class="no-results">Студии не найдены.</p>
        @else
            <div class="studios-list">
                @foreach($studios as $studio)
                    <a href="/studios/show/{{$studio->id}}" class="studio-card">
                        <div class="studio-content">
                            <h3 class="studio-name">{{ $studio->name }}</h3>
                        </div>
                        <i class="icon-arrow-right"></i>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection
