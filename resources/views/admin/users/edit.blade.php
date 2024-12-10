@extends('admin.layouts.layout')

@section('content')
<div class="container">
    <h1>Редактировать пользователя</h1>

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="is_admin">Администратор</label>
            <select class="form-control" id="is_admin" name="is_admin">
                <option value="0" {{ $user->is_admin ? '' : 'selected' }}>Нет</option>
                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Да</option>
            </select>
        </div>

        <div class="form-group">
            <label for="password">Пароль (оставьте пустым, если не хотите изменять)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Подтверждение пароля</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-success mt-2">Сохранить</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-2">Назад</a>
    </form>
</div>
@endsection