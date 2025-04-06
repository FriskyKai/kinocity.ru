@extends('layouts.layout')

@section('title', 'Список студий')

@section('content')
    <a class="btn" href="{{ route('studios.create') }}">Добавить студию</a>
    @foreach($studios as $studio)
        <a href="/studios/show/{{$studio->id}}">
            <div class="flex border">
                <div>
                    <div>Название студии: {{ $studio->name }}</div>
                </div>
            </div>
        </a>
    @endforeach
@endsection
