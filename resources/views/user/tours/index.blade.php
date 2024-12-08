@extends('user.layouts.layout')

@section('content')

<div class="container">
    <h1 class="m-4 text-center">Доступные туры</h1>

    <!-- Форма фильтрации по категориям -->
    <div class="mb-4">
        <form class="form-bb" action="{{ route('user.tours.index') }}" method="GET" class="form-inline">
            <label for="category" class="mr-2">Выберите категорию:</label>
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
            <div class="alert alert-info text-center" role="alert">
                Нет доступных туров в этой категории.
            </div>
        @else
            @foreach($tours as $tour)
                <div class="col-md-2 mb-2">
                    <div class="h-100">
                        @if($tour->image)
                            <a href="{{ route('user.tours.show', $tour) }}" class="position-relative d-block">
                                <div style="position: relative;">
                                    <img src="{{ asset($tour->image) }}" class="img-fluid" alt="{{ $tour->name }}" style="height: 200px; object-fit: cover;">
                                    <h5 class="card-title text-white" style="position: absolute; bottom: 10px; left: 10px; margin: 0;">{{ $tour->name }}</h5>
                                    <div class="shadow-inner" style="position: absolute; bottom: 0; left: 0; right: 0; height: 20%; background: rgba(0, 0, 0, 0.5);"></div>
                                </div>
                            </a>
                        @else
                            <div class="img-fluid d-flex align-items-center justify-content-center" style="height: 200px; background-color: #f8f9fa;">
                                <p class="text-muted">Изображение недоступно</p>
                            </div>
                        @endif
                        <div class="card-body mt-1">
                            <p class="card-text"><strong>Маршрут:</strong> {{ $tour->route }}</p>
                            <p class="card-text"><strong>Цена:</strong> {{ number_format($tour->price, 0, ',', ' ') }}$</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

@endsection
