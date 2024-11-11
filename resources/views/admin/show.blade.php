@extends('layouts.admin')

@section('content')
    <h1>{{ $tour->title }}</h1>
    <p>{{ $tour->description }}</p>
    <p>Цена: {{ $tour->price }}</p>

    <a href="{{ route('tours.edit', $tour) }}">Редактировать</a>
    <form action="{{ route('tours.destroy', $tour) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
    <a href="{{ route('tours.index') }}">Назад к списку</a>
@endsection
