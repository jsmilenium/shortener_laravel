@extends('layouts.app')

@section('content')

@include('sweetalert::alert')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Cadastrar Estoque</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('loja_estoque.index')}}">Estoque</a></li>
                    <li class="breadcrumb-item active">Cadastrar Estoque</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">
                    <a href="{{route('loja_estoque.index')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i>
                        Voltar
                    </a>
                </p>
                <div class="card card-primary">
                    <div class="card-header"></div>

                    <form role="form" enctype="multipart/form-data" method="post" action="{{route('loja_estoque.store')}}" >
                        <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                        <div class="card-body">
                            <div class="box-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nome">Quantidade de Ouro</label>
                                            <input type="text" name="quantidade_ouro" class="form-control" id="quantidade_ouro" placeholder="Quantidade de Ouro" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="group">Loja</label>
                                            <select name="loja_id_administrador" class="form-control">
                                            <option value="">Selecione</option>
                                            @foreach ($lojas as $loja)
                                                <option value="{{$loja->id}}">{{$loja->nome}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
