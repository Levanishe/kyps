@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Редактирование тура</h1>
    <form method="POST" action="{{ route('admin.tours.update', $tour->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Название тура</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $tour->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание тура</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $tour->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($tour->image)
                <img src="{{ asset($tour->image) }}" alt="{{ $tour->name }}" style="width: 200px; height: auto; margin-top: 10px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
