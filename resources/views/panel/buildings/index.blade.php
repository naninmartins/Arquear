@extends('adminlte::page')

@section('content_header')
    <section class="content-header">
        <h1>
            Obras
        </h1>
        <ol class="breadcrumb breadcrumb-arrow hidden-xs">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Obras</a></li>
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
            <a href="{{'url'('buildings/create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i> Cadastrar
            </a>
        </div>
    </span>
@stop

@section('content')

    <table id="buildingsTable" class="table table-bordered table-hover dataTable" role="grid">
        <thead>
            <tr role="row">
                <th>Construção:</th>
                <th>Área:</th>
                <th>Proprietário:</th>
                <th>Localização</th>
                <th>Ações:</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buildings as $building)
            <tr>
                <td>{{ $building->name }}</td>
                <td>
                    @if (isset($building->cpf)) {{ $building->cpf }} @else {{ $building->cnpj }} @endif
                </td>
                <td>{{ $building->email }}</td>
                <td>{{ $building->phone1 }}</td>
                <td>
                    <a href="{{'route'('buildings.edit',['get'=>$building->id])}}" class="btn btn-success" data-toggle="" data-placement="top" title ="Editar Produto">
                        <i class="fa fa-fw fa-pencil"></i>
                    </a>
                    <a href="#" id="{{ $building->id}}" class="btn btn-danger" data-toggle="modal" data-placement="top" title ="Apagar Produto" data-target="#modalConfirmDelete">
                        <i class="fa fa-fw fa-close"></i>
                        {{ Form::open(['action'=>['buildings\buildingController@destroy', $building->id],'class'=>'hidden','method'=>'delete', 'id'=>'modalConfirmDelete'.$building->id ]) }}
                        {{ Form::close() }}
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    {{ $buildings->links() }}
@include('layouts.utilities.delete_modal', ['modal'=>'modalConfirmDelete', 'idForm'=>'modalConfirmDelete', 'message'=>'Você tem certeza que deseja excluir este registro?'])

@stop

@section('js')

@stop
