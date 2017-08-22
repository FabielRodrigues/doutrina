@extends('layouts.admin_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Permissões
            <small>Lista de permissões no sistema.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Permissões</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">
                    @can('Cadastrar permissões')
                        <a href="{{ url('permissions/create') }}" class="btn btn-success btn-sm">CADASTRAR</a>
                    @endcan
            </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                @if (session('status'))
                    <div class="alert alert-info">
                        <strong>{{ session('status') }}</strong>
                    </div>
                @endif
                <table class="table table-striped table-bordered" id="tabela">
                    <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Descrição</td>
                        <td>Ações</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permission as $id)
                        <tr>
                            <td>{{ $id->name }}</td>
                            <td>{{ $id->description }}</td>
                            <td>
                                @can('Editar permissões')
                                    <a href='{{ url("/permissions/edit/$id->id") }}' class="btn btn-warning btn-sm">Editar</a> &nbsp; | &nbsp;
                                @endcan
                                @can('Deletar permissões')
                                    <a href='{{ url("/permissions/destroy/$id->id") }}' class="btn btn-danger btn-sm">Excluir</a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
    </div>

@endsection