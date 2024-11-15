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

        <form action="{{ route('admin.tours.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="name">Название:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Описание:</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="price">Цена:</label>
                <input type="number" name="price" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="image">Изображение:</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
