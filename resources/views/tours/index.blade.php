@extends('layouts.layout') <!-- Или ваш основной шаблон -->

@section('content')
    <div class="container">
        <h1>Доступные туры</h1>
        <div class="row">
            @foreach($tours as $tour)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset($tour->image) }}" class="card-img-top" alt="{{ $tour->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $tour->title }}</h5>
                            <p class="card-text">Цена: {{ $tour->price }}₽</p>
                            <a href="{{ route('tours.show', $tour) }}" class="btn btn-primary">Подробнее</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
