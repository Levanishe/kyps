@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Доступные туры</h1>
        <div class="row">
            @foreach($tours as $tour)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if($tour->image)
                            <img src="{{ asset('storage/' . $tour->image) }}" class="card-img-top" alt="{{ $tour->name }}" style="width: 100%; height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default-tour.jpg') }}" class="card-img-top" alt="Изображение недоступно" style="width: 100%; height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $tour->name }}</h5>
                            <p class="card-text">Цена: {{ number_format($tour->price, 0, ',', ' ') }}₽</p> <!-- Форматирование цены -->
                            <a href="{{ route('tours.show', $tour) }}" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
