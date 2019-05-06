@extends('adminlte::page')

@section('content_header')
<section class="content-header">
    <h1>
        Cadastro de Obras
    </h1>
    <ol class="breadcrumb breadcrumb-arrow hidden-xs">
        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="/people"><i class="fa fa-list-alt"></i>Pessoas</a></li>
        <li><a href="#">Cadastrar Pessoas</a></li>
    </ol>
@stop

@section('content')
    @if(isset($building))
        {!! Form::model($building, ['url'=>['/people', $building->id], 'class' => 'form', 'method' =>'PUT','id'=>'formList'])!!}
    @else
        {!! Form::open(['url'=>'/people', 'class' => 'form', 'method'=>'POST','id'=>'formList']) !!}
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
                            {!!Form::text('name', null, ['class'=>'form-control valid usefulRequired','style'=>'text-transform:uppercase','id'=>'name', 'maxlength'=>'255'])!!}
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-4">
                            {!!Form::label('l_active', 'Cadastro Ativo:', ['class'=> ' control-label'])!!}
                            {!! Form::select('active', ['1' => 'Ativo', '0' => 'Inativo'], null, ['class'=>'form-control', 'id'=>'active']) !!}
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!!Form::label('l_email', 'E-mail:*', ['class'=> ' control-label'])!!}
                            {!!Form::email('email', null, ['class'=>'form-control valid usefulRequired','style'=>'text-transform:uppercase','id'=>'email', 'maxlength'=>'60'])!!}
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-4">
                            {!!Form::label('l_cpf_cnpj', 'CPF / CNPJ:*', ['class'=> ' control-label'])!!}
                            {!!Form::text('cpf_cnpj', null, ['class'=>'form-control valid usefulRequired','style'=>'text-transform:uppercase','id'=>'cnpjCpf', 'maxlength'=>'14'])!!}
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <div class="row juridico hidden">
                        <div class="col-md-5">
                            {!!Form::label('l_fantasy_name', 'Nome de Fantasia:', ['class'=> ' control-label'])!!}
                            {!!Form::text('fantasy_name', null, ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'fantasy_name', 'maxlength'=>'255'])!!}
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-5">
                            {!!Form::label('l_nome', 'Razão Social:', ['class'=> ' control-label'])!!}
                            {!!Form::text('social_reason', null, ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'social_reason', 'maxlength'=>'255'])!!}
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            {!!Form::label('l_phone1', 'Telefone Principal:*', ['class'=> ' control-label'])!!}
                            {!!Form::text('phone1', null, ['class'=>'form-control phone usefulRequired','placeholder'=>'(00) x0000-0000','id'=>'phone1', 'maxlength'=>'13'])!!}
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-5">
                            {!!Form::label('l_phone2', 'Telefone Secundário:', ['class'=> ' control-label'])!!}
                            {!!Form::text('phone2', null, ['class'=>'form-control phone','placeholder'=>'(00) x0000-0000','id'=>'phone2', 'maxlength'=>'13'])!!}
                            <span class="material-input"></span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="form-body formAdresses">
                    <h4 class="box-title">
                        <i class="material-icons">layers</i>
                            Endereço
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            {!!Form::label('l_postalCode', 'CEP:*', ['class'=> ' control-label'])!!}
                            {!!Form::text('postal_code', (isset($building->adress->postal_code)) ? $building->adress->postal_code : null , ['class'=>'form-control valid usefulRequired','style'=>'text-transform:uppercase','id'=>'postalCode', 'maxlength'=>'9'])!!}
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-8">
                            {!!Form::label('l_street', 'Rua / Avenida:*', ['class'=> ' control-label'])!!}
                            {!!Form::text('street', (isset($building->adress->street)) ? $building->adress->street : null , ['class'=>'form-control valid usefulRequired','style'=>'text-transform:uppercase','id'=>'street'])!!}
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-5">
                                {!!Form::label('l_city', 'Cidade:*', ['class'=> ' control-label'])!!}
                                {!!Form::text('city', (isset($building->adress->city)) ? $building->adress->city : null , ['class'=>'form-control usefulRequired','style'=>'text-transform:uppercase','id'=>'city','readonly'])!!}
                                <span class="material-input"></span>
                            </div>
                            <div class="col-md-5">
                                {!!Form::label('l_state', 'Estado:*', ['class'=> ' control-label'])!!}
                                {!!Form::text('state', (isset($building->adress->state)) ? $building->adress->state : null , ['class'=>'form-control valid usefulRequired','style'=>'text-transform:uppercase','id'=>'state','readonly'])!!}
                                <span class="material-input"></span>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-4">
                            {!!Form::label('l_neighborhood', 'Bairro:*', ['class'=> ' control-label'])!!}
                            {!!Form::text('neighborhood', (isset($building->adress->neighborhood)) ? $building->adress->neighborhood : null , ['class'=>'form-control valid usefulRequired','style'=>'text-transform:uppercase','id'=>'neighborhood'])!!}
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-2">
                            {!!Form::label('l_number', 'N°:', ['class'=> ' control-label'])!!}
                            {!!Form::text('number', (isset($building->adress->number)) ? $building->adress->number : null , ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'number', 'maxlength'=>'9'])!!}
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-4">
                            {!!Form::label('l_complement', 'Complemento:', ['class'=> ' control-label'])!!}
                            {!!Form::text('complement', (isset($building->adress->complement)) ? $building->adress->complement : null , ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'complement'])!!}
                            <span class="material-input"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <div id="actions" class="col-md-5 pull-right">
                <button type="submit" class="btn btn-success"><b>Salvar</b></button>
                <a href="/people" class="btn btn-danger"><b>Cancelar</b></a>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('js')
<script src="/js/views/panel/people/People.js"></script>
<script src="/js/views/panel/people/create-edit.js"></script>
@stop
