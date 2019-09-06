@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Создать категорию</h1>
@stop

@section('content')
   <div class="box">
{!! Form::open(['url' => 'foo/bar']) !!}
    //
{!! Form::close() !!}
   	@section('css')
	
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop
   </div>

   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
