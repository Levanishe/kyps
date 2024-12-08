@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <h1>Добавить категорию</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="form-bb" action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <p for="image">Изображение:</p>
            <label class="custom-file-upload">
                <input type="file" name="image" id="image" accept="image/*">
                Выберите файл
            </label>
            <div class="file-name" id="file-name">Файл не выбран</div>
        </div>

        <button type="submit" class="btn btn-success mt-2">Создать категорию</button>
    </form>
</div>
@endsection