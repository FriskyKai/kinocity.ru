@extends('layouts.layout')

@section('title', 'Добавление актёра к медиа')

@section('content')
    <a class="btn" href="/media/show/{{$media->id}}">Вернуться к медиа</a>

    <form class="flex border" action="{{ route('media-actors.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
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
                @error('actor_id')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Выберите актёра:</label>
                <select name="actor_id">
                    @foreach($actors as $actor)
                        <option value="{{ $actor->id }}">{{ $actor->name }} {{ $actor->surname }}</option>
                    @endforeach
                </select>
                <a class="btn btn-do" href="{{ route('actors.create', ['media_id' => $media->id]) }}">Добавить нового актёра</a>
            </div>

            <button class="btn" type="submit">Добавить актёра</button>
        </div>
    </form>
@endsection
