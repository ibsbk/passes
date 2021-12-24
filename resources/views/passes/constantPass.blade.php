@extends('layouts.layout')
@section('head')
    <link rel="stylesheet" href="../resources/js/src/css/cropper.css">
@endsection

@section('content')
    <div class="like-logo">Создание пропуска</div>
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
                @error('photo')
                {{$message}}
                @enderror
                <div>Ваша фотография:</div>
                <input type="file" name="photo" onchange="onFileSelected(event)">
            </div>
            <div>
                <img id="image" src="" width="250">
            </div>
            <div>

                <button>Отправить</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="../resources/js/cropper.js"></script>
    <script type="text/javascript" src="../resources/js/passImage.js"></script>
@endsection
