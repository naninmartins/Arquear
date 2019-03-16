@extends('adminlte::page')

@section('content_header')
    <section class="content-header">
        <h1>
            Lista de Pessoas
        </h1>
        <ol class="breadcrumb breadcrumb-arrow hidden-xs">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Pessoas</a></li>
        </ol>
        <hr style="widht:0; border-color:gray;">
        @if (session('msg'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <li>{{ session('msg') }}</li>
            </div>
        @endif
    </section>
    <span class="border border-primary">
        <div class="pull-right" style="margin-right:5%;">
            <a href="{{'url'('people/create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i> Cadastrar
            </a>
        </div>
    </span>
@stop

@section('content')

    <table id="peopleTable" class="table table-bordered table-hover dataTable" role="grid">
        <thead>
            <tr role="row">
                <th>Nome:</th>
                <th>CPF/CNPJ:</th>
                <th>Email:</th>
                <th>Telefone Principal:</th>
                <th>Ações:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($people as $person)
            <tr>
                <td>{{ $person->name }}</td>
                <td>
                    @if (isset($person->cpf)) {{ $person->cpf }} @else {{ $person->cpf }} @endif
                </td>
                <td>{{ $person->email }}</td>
                <td>{{ $person->phone1 }}</td>
                <td>
                    <a href="{{'url'('people', $person->id,'edit')}}" class="btn btn-success" data-toggle="" data-placement="top" title ="Editar Produto">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                    <a href="#" id="{{$person->id}}" class="btn btn-danger" data-toggle="modal" data-placement="top" title ="Apagar Produto" data-target="#modalConfirmDelete">
                        <i class="fa fa-fw fa-close"></i>
                        {{ Form::open(['action'=>['People\PersonController@destroy', $person->id],'class'=>'hidden','method'=>'delete', 'id'=>'modalConfirmDelete'.$person->id ]) }}
                        {{ Form::close() }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    {{ $people->links() }}
@include('layouts.utilities.delete_modal', ['modal'=>'modalConfirmDelete', 'idForm'=>'modalConfirmDelete', 'message'=>'Você tem certeza que deseja excluir este registro?'])

@stop

@section('js')

@stop
