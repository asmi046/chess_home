@extends('layouts.login')




@section('title_force', "Вход в дашборд")
@section('description_force', "Вход в дашборд")

@section('main')

<section class="section">
    <div class="container is-fullhd">

        <form action="{{route('login_do')}}" method="post" class="box start-form">
            @csrf

            <header>
                <div class="system_logo">
                    <img src="{{ asset('img/logo.svg') }}" alt="">
                    <span>Шахматка</span>
                </div>
            </header>

            <div class="field">
              <label class="label is-small">E-mail</label>
              <div class="control">
                <input name="email" class="input" type="email" placeholder="name@mail.ru">
              </div>

              @error('email')
                <p class="error">{{$message}}</p>
              @enderror
            </div>

            <div class="field">
              <label class="label is-small">Пароль</label>
              <div class="control">
                <input name="password" class="input" type="password" placeholder="********">
              </div>

              @error('password')
                  <p class="error">{{$message}}</p>
              @enderror
            </div>

            <footer>
                <button type="submit" class="button ">Войти</button>
                {{-- <a class="button" href="#">Забыл пароль?</a> --}}
            </footer>

        </form>
    </div>
</section>

@endsection

