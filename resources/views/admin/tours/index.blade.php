@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <h1>Список туров</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Описание</th> 
                <th>Изображение</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tours as $tour)
                <tr>
                    <td>{{ $tour->id}}</td>
                    <td>{{ $tour->name}}</td>
                    <td>{{ $tour->description}}</td>
                    <td>
                        @if($tour->image)
                            <img src="{{ asset('storage/' . $tour->image) }}" alt="{{ $tour->name }}" class="img-fluid" style="max-width: 100px; height: auto;">
                        @else
                            <p>Нет изображения</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.tours.edit', $tour->id) }}" class="btn btn-warning">Редактировать</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
