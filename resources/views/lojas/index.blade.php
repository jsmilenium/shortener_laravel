@extends('layouts.app')
<!-- SweetAlert2 -->
<!-- <link href="{{ asset ('dist/css/sweetalert2.min.css') }}" rel="stylesheet"> -->
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Lojas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Lojas</li>
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
                <a href="{{route('loja.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>
                    Cadastrar
                </a>
            </p>
            <div class="card card-primary">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-left">Nome</th>
                                <th class="text-left">Cidade</th>
                                <th class="text-center">Telefone</th>
                                <th class="text-center">Ação</th>
                            </tr>
                        </thead>
                        @if($lojas)
                        <tbody>
                            @foreach($lojas as $loja)
                            <tr>
                                <td class="text-center">{{ $loja->id }}</td>
                                <td class="text-left">{{ $loja->nome }}</td>
                                <td class="text-left">{{ $loja->cidade }}</td>
                                <td class="text-center">{{ $loja->telefone }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-xs" href="{{route('loja.edit', $loja->id)}}"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger btn-xs" id="id_remove" data-id="{{$loja->id}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @else
                        <tbody>
                            <tr>
                            <td class="text-center">{{ $loja->id }}</td>
                                <td class="text-left">{{ $loja->nome }}</td>
                                <td class="text-left">{{ $loja->cidade }}</td>
                                <td class="text-center">{{ $loja->telefone }}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary btn-xs" href="{{route('loja.edit', $loja->id)}}"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger btn-xs" id="id_remove" data-id="{{$loja->id}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset ('/dist/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset ('/dist/js/sweetalert2.all.min.js') }}"></script>
<script type="application/javascript">
    $(document).on('click', '#id_remove', function(e) {
        e.preventDefault();
        var id = $(this).data('id');

        swal({
            title: "Deseja continuar?",
            text: "Você não poderá recuperar este registro!",
            type: "error",
            showCancelButton: !0,
            confirmButtonText: "Sim, Deletar!",
            cancelButtonText: "Não, Cancelar!",
            reverseButtons: !0
        }).then(function(e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'DELETE',
                        url: "{{ url('/loja/destroy/') }}" + '/' + id,
                        data: {
                            _token: CSRF_TOKEN,
                            id: id
                        },
                        dataType: 'JSON',
                        success: function(data) {
                            if (data.success === true) {
                                swal("Concluído com sucesso!", data.message, "success");
                                setTimeout(function() {
                                    document.location.reload(true);
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
</script>
@endsection
