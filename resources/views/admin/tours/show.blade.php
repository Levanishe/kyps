@extends('admin.layouts.layout') <!-- Предполагается, что у вас есть основной шаблон для админки -->

@section('content')
<div class="container">
    <h1>{{ $tour->name }}</h1> <!-- Название тура -->
    
    <div class="row">
        <div class="col-md-6">
            @if ($tour->image)
                <img src="{{ asset($tour->image) }}" alt="{{ $tour->name }}" class="img-fluid" /> <!-- Изображение тура -->
            @else
                <p>Изображение не доступно.</p>
            @endif
        </div>
        
        <div class="col-md-6">
            <h3>Описание</h3>
            <p>{{ $tour->description }}</p> <!-- Описание тура -->
            
            <h3>Категория</h3>
            <p>{{ optional($tour->category)->name ?? 'Категория отсутствует' }}</p>

            <h3>Цена</h3>
            <p>{{ number_format($tour->price, 2, ',', ' ') }} $</p> <!-- Цена тура с форматированием -->

            <h3>Маршрут</h3>
            <p>{{ $tour->route ?? 'Маршрут не указан' }}</p> <!-- Маршрут тура -->

            <h3>Длительность</h3>
            <p>{{ $tour->duration ?? 'Длительность не указана' }}</p> <!-- Длительность тура -->

            <h3>Даты</h3>
            <p>{{ $tour->dates ?? 'Даты не указаны' }}</p> <!-- Даты тура -->

            <a href="{{ route('admin.tours.index') }}" class="btn btn-secondary mt-3">Назад к списку туров</a> <!-- Кнопка назад -->
        </div>
    </div>
</div>
@endsection
