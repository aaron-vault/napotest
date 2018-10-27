@extends('layouts.main')

@section('content')

    <div class="title m-b-md">
        Napotest
    </div>

    <div class="links">
        <a href="{{ url('/about') }}">О нас</a>
        <a href="{{ url('/') }}">Войти или зарегистрироваться</a>
        <a href="{{ route('posts') }}">Список статей</a>
        <a href="{{ url('/users') }}">Список пользователей</a>
    </div>

@endsection

