@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Editar Grupo</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Grupo</a></li>
                    <li class="breadcrumb-item active">Editar Grupo</li>
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
                    <form id="user" novalidate="novalidate" action="{{route('groups.update', $group->id)}}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="Name">Nome</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Informe o nome do novo grupo" value="{{$group->name}}">
                        </div>
                        <div class="form-group">
                            <label for="Slug">Slug</label>
                            <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug do grupo" value="{{$group->slug}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <input type="description" name="description" class="form-control" id="description" placeholder="Informe a descrição deste grupo" value="{{$group->description}}">
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
