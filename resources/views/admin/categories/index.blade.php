@extends('admin.layouts.layout')

@section('content')
<div class="container mt-2">
    <h1 class="mb-2">Список Категории</h1>
    
    <div class="mb-3">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Добавить категорию</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="thead">
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Фото</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @if($categories->isEmpty())
                <tr>
                    <td colspan="4" class="text-center">Нет доступных категорий.</td>
                </tr>
            @else
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if($category->image)
                                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" style="width: 100px; height: 100px;">
                            @else
                                <span class="text-muted">Нет изображения</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите удалить эту категорию?');">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
