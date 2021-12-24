@extends('layouts.layout')

@section('content')
    <div class="like-logo">Вход для работников</div>
    <div>
        <form class="form" method="post">
            @csrf
            <div>
                @error('authError')
                {{$message}}
                @enderror
                @error('login')
                {{$message}}
                @enderror
                <div>Логин:</div>
                <input type="text" name="login">
            </div>
            <div>
                @error('password')
                {{$message}}
                @enderror
                <div>Пароль:</div>
                <input type="password" name="password">
            </div>
            <div>
                <button>Войти</button>
            </div>
        </form>
    </div>
@endsection
