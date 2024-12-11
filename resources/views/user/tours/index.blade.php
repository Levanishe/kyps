@extends('user.layouts.layout')

@section('content')

<div class="container">
    <h1 class="m-2 text-center">Доступные туры</h1>

    <div class="mb-2">
        <form class="form-bb" action="{{ route('user.tours.index') }}" method="GET" class="form-inline">
            <label for="category" class="mr-2">Выберите категорию:</label>
            <select name="category_id" id="category" onchange="this.form.submit()" class="form-select">
                <option value="">Все категории</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="row row-cols row-cols-lg-3 mt-3 mb-5">
        @if($tours->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            Нет доступных туров в этой категории.
        </div>
        @else
        @foreach($tours as $tour)
        <div class="col-lg">
            <div class="h-100">
                @if($tour->image)
                <a href="{{ route('user.tours.show', $tour) }}" class="position-relative d-block">
                    <div style="position: relative;">
                        <img src="{{ asset($tour->image) }}" class="img-fluid" alt="{{ $tour->name }}" style="width: 100%; height: 40vh; object-fit: cover;">
                        <div style="position: absolute; bottom: 0px; left: 0px; display:flex;background-color:rgba(0,0,0,.5); width:100%; height:15%; margin: 0;overflow-wrap: anywhere;">
                            <h5 class="card-title text-white" style="margin:auto;font-size:90%;width: 80%;">{{ $tour->name }}</h5>
                        </div>
                    </div>
                </a>
                @else
                <div class="img-fluid d-flex align-items-center justify-content-center" style="height: 200px; background-color: #f8f9fa;">
                    <p class="text-muted">Изображение недоступно</p>
                </div>
                @endif
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td class="card-text" style="width: 60%;"><strong>Маршрут:</strong> {{ $tour->route }}</td>
                            <td class="card-text" style="width: 40%;"><strong>Цена:</strong> {{ number_format($tour->price, 0, ',', ' ') }}$</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>

@endsection