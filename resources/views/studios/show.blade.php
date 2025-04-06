@extends('layouts.layout')

@section('title', 'Просмотр студии')

@section('content')
    <a class="btn" href="/studios">Вернуться к списку</a>
    <a class="btn" href="/studios/edit/{{$studio->id}}">Редактировать студию</a>
    <a class="btn" href="/studios/delete/{{$studio->id}}">Удалить студию</a>

    <div class="flex border">
        <div>
            <div>Название студии: {{ $studio->name }}</div>
        </div>
    </div>
@endsection
