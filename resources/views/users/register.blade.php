@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>Регистрация</h2>

    <!-- Вывод ошибок валидации -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input id="name" type="text" name="name" class="form-control" required autofocus value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="email">Электронная почта</label>
            <input id="email" type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input id="password" type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Подтверждение пароля</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
</div>
@endsection
