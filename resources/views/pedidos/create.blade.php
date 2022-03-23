@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Novo Pedido</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('pedido.index')}}">Pedido</a></li>
                    <li class="breadcrumb-item active">Novo Pedido</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <p class="text-center">
                <a href="{{route('pedido.index')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i>
                    Voltar
                </a>
            </p>
            <div class="card card-primary">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form novalidate="novalidate" action="{{route('pedido.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Data">Data</label>
                                    <input type="text" name="data" class="form-control" id="data" placeholder="dd/mm/yyyy" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Nro Controle">Nro Controle</label>
                                    <input type="text" name="numero_controle" class="form-control" id="numero_controle" placeholder="Informe o Nro Controle" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numeracao">Numeração</label>
                                    <input type="text" name="numeracao" class="form-control" id="numeracao" placeholder="Informe a Numeração" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="peso">Peso</label>
                                    <input type="text" name="peso" class="form-control" id="peso" placeholder="Informe o Peso" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="largura">Largura</label>
                                    <input type="text" name="largura" class="form-control" id="largura" placeholder="Informe a Largura" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="teor">Teor</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="18K" value="18K" name="teor">
                                        <label for="18K" class="custom-control-label">18K</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="14K" value="14K" name="teor">
                                        <label for="14K" class="custom-control-label">14K</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="group">Modelo</label>
                                    <select name="modelo_id" class="form-control" required>
                                    <option value="">Selecione</option>
                                    @foreach ($modelos as $modelo)
                                        <option value="{{$modelo->id}}">{{$modelo->nome}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="data_entrega">Data de Entrega</label>
                                    <input type="text" name="data_entrega" class="form-control" id="data_entrega" placeholder="dd/mm/yyyy" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <textarea cols="100%" rows="5" name="descricao" class="form-control" id="descricao" placeholder="Informe a Descrição" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="observacao">Observação</label>
                                    <textarea cols="100%" rows="5" name="observacao" class="form-control" id="observacao" placeholder="Informe a Observação"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @group('administrador')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="group">Loja</label>
                                        <select name="loja_id_administrador" class="form-control">
                                        <option value="">Selecione</option>
                                        @foreach($lojas as $loja)
                                            <option value="{{$loja->id}}">{{ $loja->nome }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endgroup
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
