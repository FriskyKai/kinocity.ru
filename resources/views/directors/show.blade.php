{{--@extends('layouts.layout')--}}

{{--@section('title', 'Просмотр режиссёра')--}}

{{--@section('content')--}}
{{--    <a class="btn" href="/directors">Вернуться к списку</a>--}}
{{--    <a class="btn" href="/directors/edit/{{$director->id}}">Редактировать режиссёра</a>--}}
{{--    <a class="btn" href="/directors/delete/{{$director->id}}">Удалить режиссёра</a>--}}

{{--    <div class="flex border">--}}
{{--        <div class="flex">--}}
{{--            <img class="big-photo" src="{{ Str::startsWith($director->photo, 'assets/') ? asset($director->photo) : asset('storage/' . $director->photo) }}" alt="Фото"/>--}}
{{--            <div class="media-info">--}}
{{--                <div>Фамилия: {{ $director->surname }}</div>--}}
{{--                <div>Имя: {{ $director->name }}</div>--}}
{{--                <div>Дата рождения: {{ $director->birthday }}</div>--}}
{{--                <div>Биография: {{ $director->bio }}</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

@extends('layouts.layout')

@section('title', 'Просмотр режиссёра')

@section('content')
    <div class="container">
        <div>
            <div class="action-buttons">
                <a class="btn btn-back" href="/directors">
                    <i class="icon-arrow-left"></i> Вернуться к списку
                </a>
                <a href="/directors/edit/{{$director->id}}">
                    <button class="btn">
                        <i class="btn-icon-edit"></i> Редактировать
                    </button>
                </a>
                <form method="GET" action="{{ route('directors.destroy', $director->id) }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn" onclick="return confirm('Вы уверены, что хотите удалить этого актёра?')">
                        <i class="btn-icon-delete"></i> Удалить
                    </button>
                </form>
            </div>
        </div>

        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar-container">
                    <img class="profile-avatar"
                         src="{{ Str::startsWith($director->photo, 'assets/') ? asset($director->photo) : asset('storage/' . $director->photo) }}"
                         alt="Фотография режиссёра"/>
                </div>
                <div class="profile-title">
                    <h1>{{ $director->name }} {{ $director->surname }}</h1>
                </div>
            </div>

            <div class="profile-details">
                <div class="detail-item">
                    <span class="detail-label">Дата рождения:</span>
                    <span class="detail-value">{{ $director->birthday }}</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Биография:</span>
                    <span class="detail-value">{{ $director->bio }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
