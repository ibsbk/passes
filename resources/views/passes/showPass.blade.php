<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../resources/css/app.css">
    <title>Document</title>
</head>
<body>
<section class="full_pass">
    @guest()
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
            <a href="{{route('/')}}">На главную</a>
    @endguest
    @auth()
        @if(Auth::user()->role_id == 2)
            @if($pass)
                <div class="like-logo">Пропуск с id: {{$pass->random_id}}</div>
                <a href="{{'staff/changeStatus/'.$pass->random_id}}" class="pass_link pass">
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
                </a>
            @endif
            @if($temporarypass)
                    <div class="like-logo">Пропуск с id: {{$temporarypass->random_id}}</div>
                    <a href="{{'staff/changeStatus/'.$temporarypass->random_id}}" class="pass_link pass">
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
                </a>
            @endif
            @if(!$pass && !$temporarypass)
                <div class="like-logo">id не найден</div>
            @endif
        @endif
        @if(Auth::user()->role_id != 2)
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
        @endif
    @endauth
</section>
</body>
</html>
