@extends('user.layouts.layout')

@section('content')
<div class="container mt-3 mb-5">
    <h1 class="mb-2">{{ $tour->name }}</h1>

    <div class="card mb-2">
        <div class="tour-image">
            @if($tour->image)
            <img src="{{ asset($tour->image) }}" alt="{{ $tour->name }}" class="card-img-top img-fluid" style="object-fit: cover;max-width: 100%; max-height: 600px;">
            @else
            <div class="card-body">
                <p class="text-muted">Нет изображения</p>
            </div>
            @endif
        </div>

        <div class="card-body">


            <p><strong>Цена:</strong> {{ number_format($tour->price, 0, ',', ' ') }}$</p>
            <p><strong><a href="{{ route('user.tours.index', $tour) }}">Категория: </a></strong>{{ optional($tour->category)->name ?? 'Категория отсутствует' }}</p>
            <p><strong>Маршрут:</strong> {{ $tour->route }}</p>
            <p><strong>Длительность:</strong> {{ $tour->duration }}</p>
            <h5 class="card-title">Описание:</h5>
            <p class="card-text">{{ $tour->description }}</p>
        </div>
    </div>

    <a href="{{ route('user.tours.index') }}" class="btn btn-secondary mb-3">Назад к списку</a>
</div>
@endsection