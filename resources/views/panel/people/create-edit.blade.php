@extends('adminlte::page')

@section('content_header')
<section class="content-header">
    <h1>
        Cadastro de Pessoas
    </h1>
    <ol class="breadcrumb breadcrumb-arrow hidden-xs">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="/people"><i class="fa fa-list-alt"></i>Pessoas</a></li>
        <li><a href="#">Cadastrar Pessoas</a></li>
    </ol>
@stop

@section('content')
    @if(isset($person))
        {!! Form::model($person, ['action'=>['Painel\Produto\ProdutoController@update', $person->id], 'class' => 'form', 'method' =>'PUT','id'=>'formList'])!!}
    @else
        {!! Form::open(['url'=>'/produto/store', 'class' => 'form', 'method'=>'POST','id'=>'formList']) !!}
    @endif
    <div class="box box-solid box-primary">
        <div class="box-header" style="color: #fff;background-color: #174a66;border-color: #174a66;">
            <h3 class="box-title">
                Cadastro de Pessoas
            </h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="tab-content">
            <div class="box-body">
                <div class="form-body">
                    <h4 class="box-title">
                        <i class="material-icons">layers</i>
                            Informações Básicas
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            {!!Form::label('l_name', 'Nome:*', ['class'=> ' control-label'])!!}
                            {!!Form::text('name', null, ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'name'])!!}
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-4">
                            {!!Form::label('l_active', 'Cadastro Ativo:', ['class'=> ' control-label'])!!}
                            {!! Form::select('active', ['Ativo','Inativo'], 'Ativo', ['class'=>'form-control', 'id'=>'active']) !!}
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!!Form::label('l_email', 'E-mail:*', ['class'=> ' control-label'])!!}
                            {!!Form::text('email', null, ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'email'])!!}
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-4">
                            {!!Form::label('l_cpf_cnpj', 'CPF / CNPJ:*', ['class'=> ' control-label'])!!}
                            {!!Form::text('cpf_cnpj', null, ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'cnpjCpf', 'maxlength'=>'14'])!!}
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <div class="row juridico hidden">
                        <div class="col-md-5">
                            {!!Form::label('l_fantasy_name', 'Nome de Fantasia:', ['class'=> ' control-label'])!!}
                            {!!Form::text('fantasy_name', null, ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'fantasy_name'])!!}
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-5">
                            {!!Form::label('l_nome', 'Razão Social:', ['class'=> ' control-label'])!!}
                            {!!Form::text('social_reason', null, ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'social_reason'])!!}
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            {!!Form::label('l_phone1', 'Telefone Principal:*', ['class'=> ' control-label'])!!}
                            {!!Form::text('phone1', null, ['class'=>'form-control phone','placeholder'=>'(00) x0000-0000','id'=>'phone1'])!!}
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-5">
                            {!!Form::label('l_phone2', 'Telefone Secundário:', ['class'=> ' control-label'])!!}
                            {!!Form::text('phone2', null, ['class'=>'form-control phone','placeholder'=>'(00) x0000-0000','id'=>'phone2'])!!}
                            <span class="material-input"></span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="form-body">
                    <h4 class="box-title">
                        <i class="material-icons">layers</i>
                            Endereço
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            {!!Form::label('l_postalCode', 'CEP:*', ['class'=> ' control-label'])!!}
                            {!!Form::text('postalCode', null, ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'postalCode', 'maxlength'=>'8'])!!}
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-8">
                            {!!Form::label('l_street', 'Rua / Avenida:*', ['class'=> ' control-label'])!!}
                            {!!Form::text('street', null, ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'street'])!!}
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-5">
                                {!!Form::label('l_city', 'Cidade:*', ['class'=> ' control-label'])!!}
                                {!!Form::text('city', null, ['class'=>'form-control ','style'=>'text-transform:uppercase','id'=>'city','disabled'])!!}
                                <span class="material-input"></span>
                            </div>
                            <div class="col-md-5">
                                {!!Form::label('l_state', 'Estado:*', ['class'=> ' control-label'])!!}
                                {!!Form::text('state', null, ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'state','disabled'])!!}
                                <span class="material-input"></span>
                            </div>
                        </div>
                    <div class="row">
                            <div class="col-md-4">
                                {!!Form::label('l_complement', 'Complemento:', ['class'=> ' control-label'])!!}
                                {!!Form::text('complement', null, ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'complement'])!!}
                                <span class="material-input"></span>
                            </div>
                        <div class="col-md-4">
                            {!!Form::label('l_neighborhood', 'Bairro:*', ['class'=> ' control-label'])!!}
                            {!!Form::text('neighborhood', null, ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'neighborhood'])!!}
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-2">
                            {!!Form::label('l_number', 'N°:*', ['class'=> ' control-label'])!!}
                            {!!Form::text('number', null, ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'number'])!!}
                            <span class="material-input"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="box-footer">
                <div id="actions" class="col-md-offset-10">
                    <button type="submit" class="btn btn-success"><b>Salvar</b></button>
                    <a href="/produto/index" class="btn btn-danger"><b>Cancelar</b></a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
<script src="/js/views/panel/people/People.js"></script>
<script src="/js/views/panel/people/create-edit.js"></script>
@stop
