@extends('layouts.layout')

@section('title', 'Редактирование кадра')

@section('content')
    <a class="btn" href="/media/show/{{$media->id}}">Вернуться к медиа</a>

    <form class="flex border" action="{{ route('footages.update', $footage->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")
            </script>
        @endif

        <div>
            <input type="hidden" name="media_id" value="{{ $media->id }}">
            <div>
                @error('photo')
                    <p class="warning">{{ $message }}</p>
                @enderror
                <label>Обновите кадр:</label>
                <input name="photo" type="file">
            </div>

            <button class="btn" type="submit">Обновить кадр</button>
        </div>
    </form>
@endsection
