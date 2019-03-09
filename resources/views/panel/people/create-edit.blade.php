@extends('adminlte::page')

@section('content_header')
<section class="content-header">
    <h1>
        Lista de Pessoas
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
    <div class="tab-pane fade in active" id="Cadastrar" role="tabpanel">
        <div class="box-body">
            <div class="form-body">
                <h4 class="box-title">
                    <i class="material-icons">layers</i>
                        Informações Basicas
                </h4>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        {!!Form::label('l_codigo', 'Código:', ['class'=> ' control-label'])!!}
                        {!!Form::text('codigo', null, ['class'=>'form-control','style'=>'text-transform:uppercase'])!!}
                        <span class="material-input"></span>

                    </div>
                    <div class="col-md-9">
                        {!!Form::label('l_nome', 'Nome do Produto:*', ['class'=> ' control-label'])!!}
                        {!!Form::text('nome', null, ['class'=>'form-control valid','style'=>'text-transform:uppercase','id'=>'product_name'])!!}
                        <span class="material-input"></span>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        {!!Form::label('l_product_type_id', 'Tipo:*', ['class'=> ' control-label'])!!}
                        {!!Form::select('product_type_id', [] ,null, ['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="material-input"></span>
                    </div>
                    <div class="col-md-3">
                        {!!Form::label('l_product_category_id', 'Categoria:*', ['class'=> ' control-label'])!!}
                        {!!Form::select('product_category_id', [] ,null, ['class'=>'form-control','placeholder'=>'']) !!}
                        <span class="material-input"></span>
                    </div>
                    <div class="col-md-6">
                        {!!Form::label('l_unit_measurement_id', 'Unidade de Medida:*', ['class'=> ' control-label'])!!}
                        {!!Form::select('unit_measurement_id', [] ,null, ['class'=>'form-control','placeholder'=>'Selecione a Unidade de Medida','rows' => '2']) !!}
                        <span class="material-input"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        {!!Form::label('l_gtin', 'GTIN:', ['class'=> ' control-label'])!!}
                        {!!Form::text('gtin', null, ['class'=>'form-control','style'=>'text-transform:uppercase'])!!}
                        <span class="material-input"></span>
                    </div>
                    <div class="col-md-6">
                        {!!Form::label('l_gtin', 'Unidade tributável GTIN:', ['class'=> ' control-label'])!!}
                        {!!Form::text('ungtin', null, ['class'=>'form-control','style'=>'text-transform:uppercase'])!!}
                        <span class="material-input"></span>
                    </div>
                </div>
                <br>
                <div class="row">
                    @if(isset($person->provider->name))
                        <div class="col-md-12">
                            {!!Form::label('l_person_name', 'Fornecedor:', ['class'=> 'control-label'])!!}
                            {!! Form::text('person_name', $person->provider->name, ['class'=>'form-control','placeholder'=>'Selecione o Fornecedor', 'id'=>'person_name', 'rows'=>'2']) !!}
                        </div>
                        <div class="col-md-6 hidden">
                            <div class="form-group">
                                {!! Form::text('provider_id', $person->provider_id, ['class'=>'form-control text-center', 'id'=>'provider_id']) !!}
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            {!!Form::label('l_person_name', 'Fornecedor:', ['class'=> 'control-label'])!!}
                            {!! Form::text('person_name', null, ['class'=>'form-control','placeholder'=>'Selecione o Fornecedor', 'id'=>'person_name', 'rows'=>'2']) !!}
                        </div>
                        <div class="col-md-6 hidden">
                            <div class="form-group">
                                {!! Form::text('provider_id', null, ['class'=>'form-control text-center', 'id'=>'provider_id']) !!}
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12">
                        <br>
                        {!!Form::label('lcomments', 'Observações:*', ['class'=> 'control-label'])!!}
                        {!!Form::textarea('observacao' ,null, ['class'=>'form-control','style'=>'text-transform:uppercase'])!!}
                    </div>
                </div>
                <br>
                <h4 class="box-title">
                    <i class="material-icons">gavel</i>
                    Informações Fiscais
                </h4>
                <hr>

                    <div class="row">
                        <div class="col-md-6">
                            {!!Form::label('l_ncm_id', 'NCM:', ['class'=> ' control-label'])!!}
                            {!!Form::select('ncm_id',[], null, ['class'=>'form-control js-example-basic-single','searchable'=>'Pesquisar','placeholder'=>'Selecione o NCM','id'=>'ncmCategoria','style'=>'text-transform:uppercase'])!!}
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-3">
                            {!!Form::label('l_product_origin_id', 'Origem:', ['class'=> ' control-label'])!!}
                            {!!Form::select('product_origin_id', [] ,null, ['class'=>'form-control','placeholder'=>'']) !!}
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-3">
                            {!!Form::label('l_tax_situation_id', 'Situação Tributária:', ['class'=> 'control-label'])!!}
                            {!!Form::select('tax_situation_id', [] ,null, ['class'=>'form-control','placeholder'=>'']) !!}
                            <span class="material-input"></span>
                        </div>
                    </div>

                    <br><br>

                    <h4 class="box-title m-t-40">
                        <i class="material-icons">monetization_on</i>
                        Informações Financeiras
                    </h4>
                <hr>

                <div class="row">
                    <div class="col-md-4">
                        {!!Form::label('l_formato', 'Formato do Produto:', ['class'=> 'control-label'])!!}
                        {{ Form::select('formato', [0=>"Simples", 1=>"Com Composicao"] ,null, [ 'class'=>'form-control','id'=>'formato'])}}
                        <span class="material-input"></span>
                    </div>

                    <div class="col-md-4">
                        {!!Form::label('l_peso_liquido', 'Peso Liquido:', ['class'=> ' control-label'])!!}
                        {!!Form::number('peso_liquido', null, ['class'=>'form-control','min'=>'0.01', 'step'=>'0.01'])!!}
                        <span class="material-input"></span>
                    </div>

                    <div class="col-md-4">
                        {!!Form::label('l_peso_bruto', 'Peso Bruto:', ['class'=> ' control-label'])!!}
                        {!!Form::number('peso_bruto', null, ['class'=>'form-control','min'=>'0.01','step'=>'0.01'])!!}
                        <span class="material-input"></span>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        {!!Form::label('l_comissao_maxima', 'Comissão Máxima Representante:', ['class'=> ' control-label'])!!}
                        {!!Form::number('comissao_maxima', null, ['class'=>'form-control','step'=>'0.01','min'=>'0'])!!}
                        <span class="material-input"></span>
                    </div>

                    <div class="col-md-4">
                        {!!Form::label('l_preco_custo', 'Preço de Custo:', ['class'=> ' control-label'])!!}
                            <div class="input-group">
                            <div class="input-group-addon"><b>R$</b></div>
                        {!!Form::number('preco_custo', null, ['class'=>'form-control','step'=>'0.01','min'=>'0', 'id'=>'preco_custo'])!!}
                        <span class="material-input"></span>
                            </div>
                    </div>

                    <div class="col-md-4">
                        {!!Form::label('l_margem_lucro', 'Margem de Lucro:', ['class'=> ' control-label'])!!}
                            <div class="input-group">
                            <div class="input-group-addon"><b>R$</b></div>
                        {!!Form::number('margem_lucro', null, ['class'=>'form-control','step'=>'0.01','min'=>'0'])!!}
                        <span class="material-input"></span>
                            </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check">
                            <label>
                                {!!Form::label('l_produto_proprio', 'Produto Próprio?:', ['class'=> 'control-label'])!!}
                                {!!Form::checkbox('produto_proprio',"propio", null, ['id'=>'produto_propio'])!!}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div >
                            <label>
                                {!!Form::label('l_blocked', 'Produto Bloqueado?:', ['class'=> 'control-label'])!!}
                                {!!Form::checkbox('blocked',"bloqueado", null, ['id'=>'blocked'])!!}
                            </label>
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

@stop


@section('js')

@stop
