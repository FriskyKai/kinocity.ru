@extends('layouts.layout')

@section('title', 'Просмотр кадра')

@section('content')
    <div class="container">
        <div class="action-buttons">
            <a href="/media/show/{{$media->id}}">
                <button class="btn btn-back">
                    <i class="btn-icon-view"></i> Просмотр медиа
                </button>
            </a>
            <a href="/footages/edit/{{$footage->id}}">
                <button class="btn">
                    <i class="btn-icon-edit"></i> Редактировать
                </button>
            </a>
            <form method="GET" action="{{ route('footages.destroy', $footage->id) }}" class="d-inline">
                @csrf
                <button type="submit" class="btn" onclick="return confirm('Вы уверены, что хотите удалить этот кадр?')">
                    <i class="btn-icon-delete"></i> Удалить
                </button>
            </form>
        </div>

        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Просмотр кадра</h1>
                <div class="footage-info">
                    <span>Из медиа: <strong>{{ $media->name }}</strong></span>
                </div>
            </div>
            <div class="card-body">
                <div class="footage-preview">
                    <img src="{{ Str::startsWith($footage->photo, 'assets/') ? asset($footage->photo) : asset('storage/' . $footage->photo) }}"
                         alt="Кадр из {{ $media->name }}"
                         onerror="this.src='{{ asset('assets/default-footage.jpg') }}'">
                </div>
            </div>
        </div>
    </div>
@endsection
