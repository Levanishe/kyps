@extends('admin.layouts.layout')
@section('content')
<div class="container mt-2 mb-2">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('admin.tours.index') }}" class="btn btn-success fs-4">←</a>
        <div class="flex-grow-1 text-center font-weight-bold fs-4">{{ $tour->name }}</div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="show-image-container mb-4">
                @if ($tour->image)
                    <img src="{{ asset($tour->image) }}" alt="{{ $tour->name }}" class="img-fluid rounded shadow-lg" />
                @else
                    <div class="show-no-image-placeholder text-center">
                        <p class="text-muted">Изображение не доступно.</p>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="card show-details shadow-lg border-0 rounded">
                <div class="card-body">
                    <div class="show-info">
                        <h4 class="show-show-info-h4">Информация о туре</h4>
                        <ul class="show-list-unstyled">
                            <li><strong>Категория:</strong> {{ optional($tour->category)->name ?? 'Категория отсутствует' }}</li>
                            <li><strong>Цена:</strong> <span class="text-success">{{ number_format($tour->price) }} $</span></li>
                            <li><strong>Маршрут:</strong> {{ $tour->route ?? 'Маршрут не указан' }}</li>
                            <li><strong>Длительность:</strong> {{ $tour->duration ?? 'Длительность не указана' }}</li>
                            <li><strong>Даты:</strong> {{ $tour->dates ?? 'Даты не указаны' }}</li>
                        </ul>
                    </div>
                    <h3 class="show-card-title">Описание</h3>
                    <p class="show-card-text">{{ $tour->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection