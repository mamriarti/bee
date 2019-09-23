@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Создать Пользователя</h1>
@stop

@section('content')
    <div class="box">

        {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'put', 'files' => true]) !!}
        {!! Form::token() !!}
        <div class="box-header with border">
            <h3 class="box-title">
                Редактируем Пользователя
            </h3>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                @include('admin.errors')

                <div class="form-group">
                    <label for="title">Имя</label>

                    <input type="text" class="form-control" id="title" placeholder="Имя Пользователя" name="name" value="{{$user->name}}" >

                </div>

                <div class="form-group">
                    <label for="title">Email</label>

                    <input type="email" class="form-control" id="email" placeholder="Email Пользователя" name="email" value="{{$user->email}}" >
                </div>

                <div class="form-group">
                    <label for="password">Пароль</label>

                    <input type="password" class="form-control" id="password" placeholder="Пароль  Пользователя" name="password" value="" >
                </div>

                <div class="invalid-feedback">
                    Каждое Поле Должно Быть Заполнено
                </div>

                <div class="form-group">
                    <label for="title">Аватар</label>

                    <input type="file" class="form-control-file" id="avatar" placeholder="Аватар Пользователя" name="avatar" value="" >
                </div>





            </div>

        </div>
        <div class="box-footer">
            <hr class="mb-4">

            <button class="btn btn-default">
                <a href="{{route('users.index')}}">Назад</a>
            </button>


            <button class="btn btn-success pull-right" type="submit">Редактировать Пользователя</button>
        </div>

        {!! Form::close() !!}
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop