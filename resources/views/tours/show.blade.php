@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>{{ $tour->name }}</h1>
        <img src="{{ asset($tour->image) }}" class="img-fluid" alt="{{ $tour->name }}">
        <p>Описание: {{ $tour->description }}</p>
        <p>Цена: {{ $tour->price }}₽</p>
        <a href="{{ route('tours.public.index') }}" class="btn btn-secondary">Назад к списку</a>
    </div>
@endsection
