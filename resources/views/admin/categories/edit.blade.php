@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <h1>Редактировать категорию</h1>
    <form class="form-bb" action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="form-group mb-3">
            <p for="image" class="form-label">Изображение:</p>
            <label class="custom-file-upload">
                <input type="file" name="image" id="image" accept="image/*" class="@error('image') is-invalid @enderror">
                Выберите файл
            </label>
            <div class="file-name" id="file-name">
                @if ($category->image)
                {{ basename($category->image) }}
                @else
                Файл не выбран
                @endif
            </div>

            @if ($category->image)
            <div class="mt-2">
                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" style="width: 100px">
            </div>
            @endif

            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-2">Обновить</button>
    </form>
</div>
@endsection