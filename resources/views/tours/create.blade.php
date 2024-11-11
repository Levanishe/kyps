@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Добавить Тур</h1>
    <form action="{{ route('tours.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="{{ route('tours.index') }}" class="btn btn-secondary">Назад</a>
    </form>
</div>
@endsection
