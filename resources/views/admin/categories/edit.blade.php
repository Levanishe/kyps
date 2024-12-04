@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <h1>Редактировать категорию</h1>
    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="form-group">
            <label for="image">Новое изображение</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            @if($category->image)
                <div class="mt-2">
                    <strong>Текущее изображение:</strong><br>
                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" style="width: 100px; height: auto;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-success mt-2">Обновить</button>
    </form>
</div>
@endsection
