@extends('layouts.admin')

@section('content')
    <h1>Создать новый тур</h1>

    <form action="{{ route('tours.store') }}" method="POST">
        @csrf
        <label for="title">Название:</label>
        <input type="text" name="title" required>

        <label for="description">Описание:</label>
        <textarea name="description" required></textarea>

        <label for="price">Цена:</label>
        <input type="number" name="price" required>

        <button type="submit">Создать</button>
    </form>
@endsection
