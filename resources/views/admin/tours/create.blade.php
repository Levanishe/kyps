@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <h1>Создать новый тур</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.tours.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Название тура:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Описание:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Цена:</label>
            <input type="number" name="price" class="form-control" required min="0" step="0.01">
        </div>

        <div class="form-group">
            <label for="image">Изображение:</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
        </div>

        <div class="form-group">
            <label for="category_id">Категория:</label>
            <select name="category_id" class="form-control" required>
                <option value="" disabled selected>Выберите категорию</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="route">Маршрут:</label>
            <input type="text" name="route" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="duration">Длительность:</label>
            <input type="text" name="duration" class="form-control" required placeholder="8 дней / 7 ночей">
        </div>

        <div class="form-group">
            <label for="dates">Даты тура:</label>
            <textarea name="dates" class="form-control" required placeholder="2000-01-01, 2024-12-31"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Создать тур</button>
    </form>

</div>
@endsection