@extends('layouts.layout')

@section('content')
    @guest()
        <div class="like-logo">
            Создайте заявку или авторизируйтесь
        </div>
    @endguest
    @auth()
        <div class="like-logo">
            Вы вошли
        </div>
    @endauth
@endsection
