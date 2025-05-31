@extends('layouts.layout')

@section('title', 'Список режиссёров')

@section('content')
    <div class="container">
        <div class="action-buttons">
            <a class="btn btn-primary btn-icon" href="{{ route('directors.create') }}">Добавить режиссёра</a>
        </div>

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
    </div>
@endsection
