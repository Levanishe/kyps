@extends('admin.layouts.layout')

@section('content')

<div class="container">
    <h1 class="mb-2">Список Туров</h1>

    @if(session('success'))
    <div class="alert alert-success ">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('admin.tours.create') }}" class="btn btn-primary">Добавить новый тур</a>
    </div>


    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Категория</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Фото</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @if($tours->isEmpty())
            <tr>
                <td colspan="7" class="text-center">Нет доступных туров.</td>
            </tr>
            @else
            @foreach($tours as $tour)
            <tr>
                <td>
                    <a href="{{ route('admin.tours.show', $tour) }}">{{ $tour->id }}</a> <!-- Ссылка на страницу показа по ID -->
                </td>
                <td>
                    <a href="{{ route('admin.tours.show', $tour) }}">{{ $tour->name }}</a> <!-- Ссылка на страницу показа по имени -->
                </td>
                <td>{{ optional($tour->category)->name ?? 'Категория отсутствует' }}</td>
                <td>{{ Str::limit($tour->description, 30) }}</td>
                <td>{{ $tour->price }}₽</td>
                <td>
                    @if($tour->image)
                    <img src="{{ asset($tour->image) }}" alt="{{ $tour->name }}" class="img-fluid" style="max-width: 100px; height: 100px;">
                    @else
                    <p class="text-muted">Нет изображения</p>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.tours.edit', $tour) }}" class="btn btn-warning btn-sm m-1">Редактировать</a>
                    <form action="{{ route('admin.tours.destroy', $tour->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm('Вы уверены, что хотите удалить этот тур?');">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection