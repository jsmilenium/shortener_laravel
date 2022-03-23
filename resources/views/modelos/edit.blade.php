@extends('layouts.app')

@section('content')

@include('sweetalert::alert')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Editar Modelo</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('modelo.index')}}">Modelos</a></li>
                    <li class="breadcrumb-item active">Editar</li>
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
                    <a href="{{route('modelo.index')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i>
                        Voltar
                    </a>
                </p>
                <div class="card card-primary">
                    <div class="card-header"></div>

                    <form role="form" enctype="multipart/form-data" method="post" action="{{route('modelo.update', $modelos->id)}}" >
                        <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                        {{ method_field('PUT') }}
                        <div class="card-body">
                            <div class="box-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do Modelo" value="{{ $modelos->nome }}" required>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
