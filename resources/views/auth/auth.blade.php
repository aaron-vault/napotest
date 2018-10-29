@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h2>Авторизация</h2>
                @include('auth.forms._authForm')
            </div>
            <div class="col-sm">
                <h2>Регистрация</h2>
                @include('auth.forms._regForm')
            </div>
            <div class="col-sm">
                <h2>Напомнить пароль</h2>
                @include('auth.forms._resetForm')
            </div>
        </div>
    </div>

@endsection