@extends('layouts.main')

@section('content')

    <div class="title m-b-md">
        Napotest
    </div>

    <div class="links">
        <a href="{{ url('/about') }}">О нас</a>
        <a href="{{ url('/auth') }}">Войти или зарегистрироваться</a>
        @if(Auth::check())
            <a href="{{ url('/posts') }}">Список статей</a>
            <a href="{{ url('/users') }}">Список пользователей</a>
            <a href="{{ url('/home') }}">Кабинет</a>
        @endif
    </div>

@endsection

