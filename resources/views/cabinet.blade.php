@extends('layouts.all')


@section('title_force', "Данные пользователя")
@section('description_force', "Данные пользователя")

@section('main')
    <section class="user_data">
        <div class="container_main">
            <br>
            <br>

            <p><strong>Имя:</strong> {{ auth()->user()->name }}</p>
            <p><strong>e-mail:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Телефон:</strong> {{ auth()->user()->phone }}</p>
            <p><strong>Статус:</strong> {{ auth()->user()->rang }}</p>

            <br>
            <br>
            <a href="{{ route('logout') }}" class="button is-warning">Выйти</a>
        </div>
    </section>
@endsection

