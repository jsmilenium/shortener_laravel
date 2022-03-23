@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pedidos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Pedidos</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<!-- Main content -->
<section class="content">
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-12">
            <form role="search" action="{{route('pedido.filter')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <select name="status" class="form-control">
                            <option value="">Selecione</option>
                                <option value="Pendente">Pendente</option>
                                <option value="Produção">Produção</option>
                                <option value="Expedição">Expedição</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </div>
                </div>
            </form>
            <p class="text-center">
                <a href="{{route('pedido.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>
                    Novo
                </a>
            </p>
            <div class="card card-primary">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="pedido-novo" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-left">Controle</th>
                                <th class="text-left">Loja</th>
                                <th class="text-left">Peso</th>
                                <th class="text-left">Numeração</th>
                                <th class="text-left">Situação</th>
                                <th class="text-left">Entrega</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedidos as $pedido)
                            <tr>
                                <td class="text-center">{{ $pedido->id }}</td>
                                <td class="text-left">{{ $pedido->numero_controle }}</td>
                                <td class="text-left">{{ $pedido->Loja->nome }}</td>
                                <td class="text-left">{{ $pedido->peso }}</td>
                                <td class="text-left">{{ $pedido->numeracao }}</td>
                                <td class="text-left">{{ $pedido->status }}</td>
                                <td class="text-left">{{ Carbon\Carbon::parse($pedido->data_entrega)->format('d/m/Y') }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-xs" href="{{ route('pedido.show', $pedido->id) }}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-primary btn-xs" href="{{ route('pedido.ticket', $pedido->id) }}" target="_blank"><i class="fa fa-print"></i></a>
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
<script src="{{ asset ('/dist/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset ('/dist/js/sweetalert2.all.min.js') }}"></script>
@endsection
