@extends('user.layouts.layout')

@section('content')

<div class="container mx-auto mt-2">
    <h1 class="text-center">Подтверждение адреса электронной почты</h1>

    @if (session('resent'))
    <div class="alert alert-success" role="alert">
        Ссылка для подтверждения была отправлена на вашу электронную почту.
    </div>
    @endif

    <p>
        Перед тем как продолжить, пожалуйста, проверьте свою электронную почту на наличие ссылки для подтверждения.
    </p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary">
            Отправить письмо повторно
        </button>
    </form>
</div>

@endsection