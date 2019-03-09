@extends('adminlte::page')

@section('content_header')
    <h1>Painel de Controle</h1>
@stop

@section('content')
    <p>Seja Bem Vindo {{ Auth::user()->name }} !</p>
@stop
