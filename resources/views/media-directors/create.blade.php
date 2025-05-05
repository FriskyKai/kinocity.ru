@extends('layouts.layout')

@section('title', 'Добавление режиссёра к медиа')

@section('content')
    <a class="btn" href="/media/show/{{$media->id}}">Вернуться к медиа</a>

    <form class="flex border" action="{{ route('media-directors.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")
            </script>
        @endif

        <div>
            <p>* - Обязательное поле</p>
            <input type="hidden" name="media_id" value="{{ $media->id }}">
            <div>
                @error('director_id')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Выберите режиссёра:</label>
                <select name="director_id">
                    @foreach($directors as $director)
                        <option value="{{ $director->id }}">{{ $director->name }} {{ $director->surname }}</option>
                    @endforeach
                </select>
                <a class="btn btn-do" href="{{ route('directors.create', ['media_id' => $media->id]) }}">Добавить нового режиссёра</a>
            </div>

            <button class="btn" type="submit">Добавить режиссёра</button>
        </div>
    </form>
@endsection
