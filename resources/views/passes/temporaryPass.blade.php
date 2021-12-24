@extends('layouts.layout')

@section('content')
    <div class="like-logo">Создание временного пропуска</div>
    <div>(пропуск создаётся на 2 недели)</div>
    <div>
        <form class="form" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                @error('surname')
                {{$message}}
                @enderror
                <div>Фамилия:</div>
                <input type="text" name="surname">
            </div>
            <div>
                @error('name')
                {{$message}}
                @enderror
                <div>Имя:</div>
                <input type="text" name="name">
            </div>
            <div>
                @error('lastname')
                {{$message}}
                @enderror
                <div>Отчество:</div>
                <input type="text" name="second_name">
            </div>
            <div>
                @error('email')
                {{$message}}
                @enderror
                <div>Email:</div>
                <input type="email" name="email">
            </div>
            <div>
                @error('purpose')
                {{$message}}
                @enderror
                <div>Цель посещения:</div>
                <textarea name="purpose"></textarea>
            </div>
            <div>
                @error('date')
                {{$message}}
                @enderror
                <div>дата начала:</div>
                <input type="date" name="date">
            </div>
            <div>
                @error('photo')
                {{$message}}
                @enderror
                <div>Ваша фотография:</div>
                <input type="file" name="photo">
            </div>
            <div>
                <button>Отправить</button>
            </div>
        </form>
@endsection
