@extends('user.layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Категории</h1>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Название</th>
                <th>Изображение</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>
                    <a href="{{ route('tours.index', ['category_id' => $category->id]) }}">
                        {{ $category->name }}
                    </a>
                </td>
                <td>
                    @if($category->image) <!-- Проверяем, есть ли изображение -->
                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" style="width: 100px; height: 100px;">
                    @else
                    Нет изображения
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($categories->isEmpty())
    <div class="alert alert-info" role="alert">
        Нет доступных категорий.
    </div>
    @endif
</div>
@endsection
