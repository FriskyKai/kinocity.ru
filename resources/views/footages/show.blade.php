@extends('layouts.layout')

@section('title', 'Просмотр кадра')

@section('content')
    <a class="btn" href="/media/show/{{$media->id}}">Вернуться к медиа</a>
    <a class="btn" href="/footages/edit/{{$footage->id}}">Редактировать кадр</a>
    <a class="btn" href="/footages/delete/{{$footage->id}}">Удалить кадр</a>

    <div class="flex border">
        <img class="footage-show" src="{{ Str::startsWith($footage->photo, 'assets/') ? asset($footage->photo) : asset('storage/' . $footage->photo) }}" alt="Кадр"/>
    </div>
@endsection
