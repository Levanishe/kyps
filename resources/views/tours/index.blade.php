@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Список Туров</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('tours.create') }}" class="btn btn-primary">Добавить Тур</a>
    <table class="table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tours as $tour)
                <tr>
                    <td>{{ $tour->title }}</td>
                    <td>{{ $tour->description }}</td>
                    <td>{{ $tour->price }}</td>
                    <td>
                        <a href="{{ route('tours.show', $tour) }}" class="btn btn-info">Просмотреть</a>
                        <a href="{{ route('tours.edit', $tour) }}" class="btn btn-warning">Редактировать</a>
                        <form action="{{ route('tours.destroy', $tour) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
