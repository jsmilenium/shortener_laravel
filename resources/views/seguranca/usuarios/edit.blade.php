@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Editar Usuário</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuários</a></li>
                    <li class="breadcrumb-item active">Editar Usuário</li>
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
                <a href="{{route('users.index')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i>
                    Voltar
                </a>
            </p>
            <div class="card card-primary">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="user" novalidate="novalidate" action="{{route('users.update', $user->id)}}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="Name">Nome</label>
                            <input type="name" name="name" class="form-control" id="name" placeholder="Informe o nome" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="E-mail">E-mail</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Informe o e-mail" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Informe a senha">
                        </div>
                        <div class="form-group">
                            <label for="group">Perfil</label>
                            <select name="group" class="form-control">
                            <option value="">Selecione</option>
                            @foreach ($groups as $group)
                                <option value="{{$group->id}}"
                                    @foreach ($user->groups as $userGroup)
                                        @if ($userGroup->id == $group->id) selected @endif
                                    @endforeach
                                    >{{$group->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="group">Loja</label>
                            <select name="loja_id" class="form-control">
                            <option value="">Selecione</option>
                            @foreach ($lojas as $loja)
                                <option value="{{$loja->id}}"
                                    @if ($user->loja_id == $loja->id) selected @endif
                                    >{{$loja->nome}}</option>
                            @endforeach
                            </select>
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
