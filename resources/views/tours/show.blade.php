@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>{{ $tour->title }}</h1>
    <p><strong>Описание:</strong> {{ $tour->description }}</p>
    <p><strong>Цена:</strong> {{ $tour->price }}</p>
    <a href="{{ route('tours.index') }}" class="btn btn-secondary">Назад</a>
    <a href="{{ route('tours.edit', $tour) }}" class="btn btn-warning">Редактировать</a>
    <form action="{{ route('tours.destroy', $tour) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
</div>
@endsection
