@extends('layouts.layout')
@section('head')
    <script type="text/javascript" src="../resources/js/js.js"></script>
@endsection
@section('content')
    <div class="like-logo"></div>
    <div>
        @if($pass)
            <div class="like-logo">Пропуск с id: {{$pass->random_id}}</div>
            <div class="pass">
                <div class="image">
                    <img class="pass-photo" src="../storage/app/public/{{$pass->photo}}">
                </div>
                <div class="pass-text">
                    <div class="text-item">
                        <div>Имя:</div>
                        <div>{{$pass->name}}</div>
                    </div>
                    <div class="text-item">
                        <div>Фамилия:</div>
                        <div>{{$pass->surname}}</div>
                    </div>
                    <div class="text-item">
                        <div>Отчество:</div>
                        <div>{{$pass->second_name}}</div>
                    </div>
                    <div class="text-item">
                        <div>Тип пропуска:</div>
                        <div>@foreach($types as $type)
                                @if($type->id == $pass->type_id)
                                    {{$type->name}}
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="text-item">
                        <div>Статус пропуска:</div>
                        <div>@foreach($statuses as $status)
                                @if($status->id == $pass->status_id)
                                    {{$status->name}}
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($temporarypass)
            <div class="like-logo">Пропуск с id: {{$temporarypass->random_id}}</div>
            <div class="pass">
                <div class="image">
                    <img class="pass-photo" src="../storage/app/public/{{$temporarypass->photo}}">
                </div>
                <div class="pass-text">
                    <div class="text-item">
                        <div>Имя:</div>
                        <div>{{$temporarypass->name}}</div>
                    </div>
                    <div class="text-item">
                        <div>Фамилия:</div>
                        <div>{{$temporarypass->surname}}</div>
                    </div>
                    <div class="text-item">
                        <div>Отчество:</div>
                        <div>{{$temporarypass->second_name}}</div>
                    </div>
                    <div class="text-item">
                        <div>Тип пропуска:</div>
                        <div>@foreach($types as $type)
                                @if($type->id == $temporarypass->type_id)
                                    {{$type->name}}
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="text-item">
                        <div>Статус пропуска:</div>
                        <div>@foreach($statuses as $status)
                                @if($status->id == $temporarypass->status_id)
                                    {{$status->name}}
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="text-item">
                        <div>Начало пропуска:</div>
                        <div>{{$temporarypass->start_action}}</div>
                    </div>
                    <div class="text-item">
                        <div>Конец пропуска:</div>
                        <div>{{$temporarypass->end_action}}</div>
                    </div>
                </div>
            </div>
        @endif
        @if(!$pass && !$temporarypass)
            <div class="like-logo">id не найден</div>
        @endif
        <form class="form" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                @error('status')
                {{$message}}
                @enderror
                <div>Изменить статус на :</div>
                <select name="status" id="status">
                    @foreach($statuses as $status)
                        @if($status->id != 4)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="none" id="comment">
                @error('comment')
                {{$message}}
                @enderror
                <div>Причина:</div>
                <textarea name="comment" placeholder="причина отклонения"></textarea>
            </div>
            <div>
                <button>Отправить</button>
            </div>
        </form>
    </div>
@endsection
