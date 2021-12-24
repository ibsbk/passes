@extends('layouts.layout')

@section('content')
    <div class="like-logo">Создание пропуска</div>
    <div class="pass-types">
        <div><a href="{{route('temporaryPass')}}">временный пропуск</a></div>
        <div><a href="{{route('constantPass')}}">постоянный пропуск</a></div>
    </div>
@endsection
