@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Crawlers</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item active">Crawlers</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <form role="search" action="" method="post">
                @csrf
            </form>
            <div class="card card-primary">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="crawler" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-left">Title</th>
                                <th class="text-left">Address</th>
                                <th class="text-left">Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($crawlers as $crawler)
                            <tr>
                                <td class="text-center">{{ $crawler->id }}</td>
                                <td class="text-left">{{ $crawler->title }}</td>
                                <td class="text-left">{{ $crawler->address }}</td>
                                <td class="text-left">{{ $crawler->phone }}</td>
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
