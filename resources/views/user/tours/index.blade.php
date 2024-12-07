@extends('user.layouts.layout')

@section('content')

<div class="container">
    <h1 class="m-2">Доступные туры</h1>

    <!-- Форма фильтрации по категориям -->
    <div class="mb-4">
        <form action="{{ route('user.tours.index') }}" method="GET">
            <label for="category">Выберите категорию:</label>
            <select name="category_id" id="category" onchange="this.form.submit()" class="form-select">
                <option value="">Все категории</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="row mt-3 mb-5">
        @if($tours->isEmpty())
            <div class="alert alert-info" role="alert">
                Нет доступных туров в этой категории.
            </div>
        @else
            @foreach($tours as $tour)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        @if($tour->image)
                            <img src="{{ asset($tour->image) }}" class="card-img-top" alt="{{ $tour->name }}" style="width: 100%; height: 300px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default-tour.jpg') }}" class="card-img-top" alt="Изображение недоступно" style="width: 100%; height: 300px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $tour->name }}</h5>
                            <p class="card-text">Цена: {{ number_format($tour->price, 0, ',', ' ') }}$</p>
                            <a href="{{ route('user.tours.show', $tour) }}" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

@endsection
