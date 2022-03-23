@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Cadastrar Grupo</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Grupos</li>
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
                <a href="{{route('groups.index')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i>
                    Voltar
                </a>
            </p>
            <div class="card card-primary">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <form id="user" novalidate="novalidate" action="{{route('groups.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="Name">Nome</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Informe o nome do novo grupo">
                        </div>
                        <div class="form-group">
                            <label for="Slug">Slug</label>
                            <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug do grupo">
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Informe a descrição deste grupo">
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
