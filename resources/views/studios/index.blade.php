{{--@extends('layouts.layout')--}}

{{--@section('title', 'Список студий')--}}

{{--@section('content')--}}
{{--    <a class="btn" href="{{ route('studios.create') }}">Добавить студию</a>--}}
{{--    @foreach($studios as $studio)--}}
{{--        <a href="/studios/show/{{$studio->id}}">--}}
{{--            <div class="flex border">--}}
{{--                <div>--}}
{{--                    <div>Название студии: {{ $studio->name }}</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </a>--}}
{{--    @endforeach--}}
{{--@endsection--}}

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
    </div>
@endsection
