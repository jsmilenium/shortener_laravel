@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('pedido.index')}}">Pedidos</a></li>
                    <li class="breadcrumb-item active">Movimentação do Pedido</li>
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
            <p class="text-center">
                <a href="{{route('pedido.index')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i>
                    Voltar
                </a>
            </p>
            <div class="card card-primary">
                <div class="card-header">
                    Movimentação do Pedido {{ $pedido->id }}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-left">Ctrl</th>
                                <th class="text-left">Data</th>
                                <th class="text-left">Loja</th>
                                <th class="text-left">Descrição</th>
                                <th class="text-left">Peso</th>
                                <th class="text-left">Numeração</th>
                                <th class="text-left">Situação</th>
                                <th class="text-left">Entrega</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">{{ $pedido->numero_controle }}</td>
                                <td class="text-left">{{ Carbon\Carbon::parse($pedido->data)->format('d/m/Y') }}</td>
                                @foreach($lojas as $loja)
                                    @if($pedido->loja_id == $loja->loja_id)
                                        <td class="text-left">{{ $loja->Loja->nome }}</td>
                                    @endif
                                @endforeach
                                <td class="text-left">{{ $pedido->descricao }}</td>
                                <td class="text-left">{{ $pedido->peso }}</td>
                                <td class="text-left">{{ $pedido->numeracao }}</td>
                                <td class="text-left">{{ $pedido->status }}</td>
                                <td class="text-left">{{ Carbon\Carbon::parse($pedido->data_entrega)->format('d/m/Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="card-footer">
                        @if($pedido->status == 'Pendente')
                            <a href="" class="btn btn-primary" id="producao" data-id="{{$pedido->id}}">Enviar p/ Produção</a>
                        @elseif($pedido->status == 'Produção')
                            <button class="btn btn-primary" id="expedicao">Enviar p/ Expedição</button>
                            <form id="form-expedicao" style="display: none;" role="form" enctype="multipart/form-data" method="post" action="{{route('pedido.update', $pedido->id)}}" >
                                <input type="hidden" value="{{csrf_token()}}" name="_token"/>
                                <input type="hidden" value="Expedição" name="status"/>
                                {{ method_field('PUT') }}
                                <div class="card-body">
                                    <div class="box-body">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="peso_entregue">Peso Entregue</label>
                                                    <input type="text" name="peso_entregue" class="form-control" id="peso_entregue" placeholder="Peso Entregue" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="custo_adicional">Custo Adicional</label>
                                                    <input type="text" name="custo_adicional" class="form-control" id="custo_adicional" placeholder="Custo Adicional">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="observacoes_expedicao">Observações</label>
                                                    <input type="text" name="observacoes_expedicao" class="form-control" id="observacoes_expedicao" placeholder="Observações">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-warning">Enviar p/ Loja</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Pedidos Movimentação -->
            <div class="card card-success">
                <div class="card-header">
                    Histórico de Movimentações
                </div>
                <div class="card-body">
                    <table id="pedido-movimentacao" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-left">#</th>
                                <th class="text-left">Descrição</th>
                                <th class="text-left">Data</th>
                                <th class="text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movimentacoes as $movimentacao)
                                <tr>
                                    <td class="text-left">{{ $movimentacao->id }}</td>
                                    <td class="text-left">{{ $movimentacao->descricao }}</td>
                                    <td class="text-left">{{ Carbon\Carbon::parse($movimentacao->data)->format('d/m/Y H:i:s') }}</td>
                                    <td class="text-left">{{ $movimentacao->status }}</td>
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
<script type="application/javascript">
    $(document).on('click', '#producao', function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        swal({
            title: "Deseja enviar p/ Produção?",
            text: "Você não poderá recuperar este registro!",
            type: "error",
            showCancelButton: !0,
            confirmButtonText: "Sim!",
            cancelButtonText: "Não",
            reverseButtons: !0
        }).then(function(e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'PUT',
                        enctype: 'multipart/form-data',
                        url: "{{ url('/pedido/update/') }}" + '/' + id,
                        data: {
                            _token: CSRF_TOKEN,
                            id: id,
                            status: 'Produção'
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            if (data.success === true) {
                                swal("Concluído com sucesso!", data.message, "success");
                                setTimeout(function() {
                                    window.location.href = "{{ url('/pedido') }}";
                                }, 1000)

                            } else {
                                swal("Error!", data.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }
            },
            function(dismiss) {
                return false;
            })

    });

    $('#expedicao').on('click', function(e) {
        $('#form-expedicao').css('display', 'block');
    });
</script>
@endsection
