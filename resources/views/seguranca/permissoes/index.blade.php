@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Permissões</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Permissões</li>
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
                <a href="{{route('permissions.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>
                    Cadastrar
                </a>
            </p>
            <div class="card card-primary">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="group-cadastro" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-left">Nome</th>
                                <th class="text-left">Slug</th>
                                <th class="text-left">Description</th>
                                <th class="text-left">Group</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                            <tr>
                                <td class="text-center">{{ $permission->id }}</td>
                                <td class="text-left">{{ $permission->name }}</td>
                                <td class="text-left">{{ $permission->slug }}</td>
                                <td class="text-left">{{ $permission->description }}</td>
                                <td class="text-left">
                                    @foreach($permission->groups()->get() as $group)
                                        {{$group->name}}
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-xs" href="{{ route('permissions.edit', $permission->id) }}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-xs">
                                        <form action="{{ route('groups.destroy', $permission->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
