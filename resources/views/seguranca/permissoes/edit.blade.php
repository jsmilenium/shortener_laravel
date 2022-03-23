@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Editar Permissão</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Grupo</a></li>
                    <li class="breadcrumb-item active">Editar Permissão</li>
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
                <a href="{{route('permissions.index')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i>
                    Voltar
                </a>
            </p>
            <div class="card card-primary">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="user" novalidate="novalidate" action="{{route('permissions.update', $permission->id)}}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="Name">Nome</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Informe o nome do novo grupo" value="{{$permission->name}}">
                        </div>
                        <div class="form-group">
                            <label for="Slug">Slug</label>
                            <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug do grupo" value="{{$permission->slug}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="description" name="description" class="form-control" id="description" placeholder="Informe a descrição deste grupo" value="{{$permission->description}}">
                        </div>
                        <div class="form-group">
                            <label for="group">Perfil</label>
                            <select name="group[]" id="group-permission" class="form-control select2" multiple="multiple">
                            <option value="">Selecione</option>
                            @foreach ($groups as $group)
                                <option value="{{$group->id}}"
                                    @foreach ($permission->groups as $userGroup)
                                        @if ($userGroup->id == $group->id) selected @endif
                                    @endforeach
                                    >{{$group->name}}</option>
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
<script src="{{ asset ('/dist/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset ('/dist/js/select2.min.js') }}"></script>
<script>
    $('.select2').select2({
            tags: "true",
            placeholder: "Selecione...",
            allowClear: true,
            width: 'resolve',
        });
</script>
@endsection
