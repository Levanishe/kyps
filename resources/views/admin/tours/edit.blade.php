@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <h1>Редактирование тура</h1>
    <form class="form-bb" method="POST" action="{{ route('admin.tours.update', $tour) }}" enctype="multipart/form-data">
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
            <label for="price" class="form-label">Цена</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $tour->price) }}" required>
            @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="route" class="form-label">Маршрут</label>
            <input type="text" class="form-control @error('route') is-invalid @enderror" id="route" name="route" value="{{ old('route', $tour->route) }}" required>
            @error('route')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Длительность</label>
            <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ old('duration', $tour->duration) }}" required>
            @error('duration')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="dates" class="form-label">Даты</label>
            <input type="text" class="form-control @error('dates') is-invalid @enderror" id="dates" name="dates" value="{{ old('dates', $tour->dates) }}" required>
            @error('dates')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id">Категория:</label>
            <select name="category_id" class="form-control" required>
                <option value="" disabled>Выберите категорию</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $tour->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <p for="image" class="form-label">Изображение:</p>
            <label class="custom-file-upload">
                <input type="file" name="image" id="image" accept="image/*" class="@error('image') is-invalid @enderror">
                Выберите файл
            </label>
            <div class="file-name" id="file-name">
                @if ($tour->image)
                {{ basename($tour->image) }}
                @else
                Файл не выбран
                @endif
            </div>

            @if ($tour->image)
            <div class="mt-2">
                <img src="{{ asset($tour->image) }}" alt="{{ $tour->name }}" style="width: 100px">
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