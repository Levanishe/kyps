@extends('user.layouts.layout')

@section('content')
<div class="container">
    <h1>{{ $tour->name }}</h1>

    <div class="tour-image">
        @if($tour->image)
            <img src="{{ asset($tour->image) }}" alt="{{ $tour->name }}" class="img-fluid" style="width: 500px; height: 300px;">
        @else
            <p class="text-muted">Нет изображения</p>
        @endif
    </div>

    <div class="tour-details mt-3">
        <p><strong>Описание:</strong> {{ $tour->description }}</p>
        <p><strong>Цена:</strong> {{ $tour->price }}₽</p>
    </div>

    <a href="{{ route('user.tours.index') }}" class="btn btn-secondary mt-3">Назад к списку</a>
</div>
@endsection
