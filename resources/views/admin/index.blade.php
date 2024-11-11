@extends('layouts.admin')

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
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tours as $tour)
                <tr>
                    <td>{{ $tour->id }}</td>
                    <td>{{ $tour->name }}</td>
                    <td>
                        <a href="{{ route('admin.tours.edit', $tour->id) }}" class="btn btn-warning">Редактировать</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
