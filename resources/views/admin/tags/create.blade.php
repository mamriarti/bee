@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Создать Тег</h1>
@stop

@section('content')
    <div class="box">

        {!! Form::open(['route' => 'tags.store']) !!}
        {!! Form::token() !!}
        <div class="box-header with border">
            <h3 class="box-title">
                Добавляем Тег
            </h3>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                @include('admin.errors')
                <div class="form-group">
                    <label for="title">Название</label>

                    <input type="text" class="form-control" id="title" placeholder="Название тега" name="title" value="" >
                    <div class="invalid-feedback">
                        Данное Поле Должно Быть Заполнено
                    </div>
                </div>

            </div>

        </div>
        <div class="box-footer">
            <hr class="mb-4">

            <button class="btn btn-default">
                <a href="{{route('tags.index')}}">Назад</a>
            </button>


            <button class="btn btn-success pull-right" type="submit">Добавить Тег</button>
        </div>

        {!! Form::close() !!}
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop