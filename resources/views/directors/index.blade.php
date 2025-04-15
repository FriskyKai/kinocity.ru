@extends('layouts.layout')

@section('title', 'Список режиссёров')

@section('content')
    <a class="btn" href="{{ route('directors.create') }}">Добавить режиссёра</a>
    @foreach($directors as $director)
        <a href="/directors/show/{{$director->id}}">
            <div class="flex border">
                <div class="flex">
                    <img class="small-photo" src="{{ Str::startsWith($director->photo, 'assets/') ? asset($director->photo) : asset('storage/' . $director->photo) }}" alt="Фото"/>
                    <div class="media-info">
                        <div>Фамилия: {{ $director->surname }}</div>
                        <div>Имя: {{ $director->name }}</div>
                        <div>Дата рождения: {{ $director->birthday }}</div>
                        <div>Биография: {{ $director->bio }}</div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
@endsection
