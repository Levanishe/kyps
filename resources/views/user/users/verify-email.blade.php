@extends('user.layouts.layout')

@section('content')

<div class="container mx-auto mt-2">
    <h1 class="text-center">Подтверждение адреса электронной почты</h1>

    @if (session('message'))
    <div class="alert alert-success" role="alert">
        Ссылка для подтверждения была отправлена на вашу электронную почту.
    </div>
    @endif

    <p class="mt-3">
        Перед тем как продолжить, пожалуйста, проверьте свою электронную почту на наличие ссылки для подтверждения.
    </p>
    <div class="form-verify text-center">
        <form class="form-bb" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary p-3">
                Отправить письмо повторно
            </button>
        </form>
    </div>
</div>

@endsection