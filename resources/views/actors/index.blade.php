@extends('layouts.layout')

@section('title', 'Список актёров')

@section('content')
    <a class="btn" href="{{ route('actors.create') }}">Добавить актёра</a>
    @foreach($actors as $actor)
        <a href="/actors/show/{{$actor->id}}">
            <div class="flex border">
                <div class="flex">
                    <img class="small-photo" src="{{ Str::startsWith($actor->photo, 'assets/') ? asset($actor->photo) : asset('storage/' . $actor->photo) }}" alt="Фото"/>
                    <div class="media-info">
                        <div>Фамилия: {{ $actor->surname }}</div>
                        <div>Имя: {{ $actor->name }}</div>
                        <div>Дата рождения: {{ $actor->birthday }}</div>
                        <div>Биография: {{ $actor->bio }}</div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
@endsection
