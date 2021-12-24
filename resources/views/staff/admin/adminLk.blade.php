@extends('layouts.layout')

@section('content')
    <div class="constants">
        <div class="like-logo">Постоянные пропуски</div>
        @foreach($passes as $pass)
            <a href="{{'/editPass/'.$pass->random_id}}" class="pass_link">
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
        @endforeach
    </div>
    <div class="temporaries">
        <div class="like-logo">Временные пропуски</div>
        @foreach($temporarypasses as $temporarypass)
            <a href="{{('/editPass/'.$temporarypass->random_id)}}" class="pass_link">
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
        @endforeach
    </div>
@endsection
