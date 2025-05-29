{{--@extends('layouts.layout')--}}

{{--@section('title', 'Просмотр студии')--}}

{{--@section('content')--}}
{{--    <a class="btn" href="/studios">Вернуться к списку</a>--}}
{{--    <a class="btn" href="/studios/edit/{{$studio->id}}">Редактировать студию</a>--}}
{{--    <a class="btn" href="/studios/delete/{{$studio->id}}">Удалить студию</a>--}}

{{--    <div class="flex border">--}}
{{--        <div>--}}
{{--            <div>Название студии: {{ $studio->name }}</div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

@extends('layouts.layout')

@section('title', 'Просмотр студии')

@section('content')
    <div class="container">
        <div>
            <div class="action-buttons">
                <a class="btn btn-back" href="/studios">
                    <i class="icon-arrow-left"></i> Вернуться к списку
                </a>
                <a href="/studios/edit/{{$studio->id}}">
                    <button class="btn">
                        <i class="btn-icon-edit"></i> Редактировать
                    </button>
                </a>
                <form method="GET" action="{{ route('studios.destroy', $studio->id) }}">
                    @csrf
                    <button type="submit" class="btn" onclick="return confirm('Вы уверены, что хотите удалить эту студию?')">
                        <i class="btn-icon-delete"></i> Удалить
                    </button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h1 class="card-title">{{ $studio->name }}</h1>
            </div>
            <div class="card-body">
                <div class="detail-grid">
                    <div class="detail-item">
                        <span class="detail-label">ID студии:</span>
                        <span class="detail-value">{{ $studio->id }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Название:</span>
                        <span class="detail-value">{{ $studio->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
