@extends('layouts.layout')

@section('title', 'Добавление кадра')

@section('content')
    <a class="btn" href="/media/show/{{$media->id}}">Вернуться к медиа</a>

    <form class="flex border" action="{{ route('footages.store') }}" method="POST" enctype="multipart/form-data">
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
                @error('photo')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>* Загрузите кадр:</label>
                <input name="photo" type="file" required>
            </div>

            <button class="btn" type="submit">Добавить кадр</button>
        </div>
    </form>
@endsection
