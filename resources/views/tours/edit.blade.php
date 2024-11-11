@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Редактировать Тур</h1>
    <form action="{{ route('tours.update', $tour) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" name="title" class="form-control" value="{{ $tour->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" required>{{ $tour->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input type="number" name="price" class="form-control" value="{{ $tour->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
        <a href="{{ route('tours.index') }}" class="btn btn-secondary">Назад</a>
    </form>
</div>
@endsection
