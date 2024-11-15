@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <h1>Редактирование тура</h1>
    <form method="POST" action="{{ route('admin.tours.update', $tour->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Название тура</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $tour->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Описание тура</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description', $tour->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            @if ($tour->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $tour->image) }}" alt="{{ $tour->name }}" style="width: 200px; height: auto;">
                </div>
            @endif
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
@endsection
