@extends('layouts.admin_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Funções
            <small>Lista de funções no sistema.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Funções</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                    @can('Cadastrar funções')
                        <a href="{{ url('roles/create') }}" class="btn btn-success btn-sm">CADASTRAR</a>
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
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <td colspan="58">{{ $roles->perPage() }} de {{ $roles->total() }} registros.</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>Descrição</td>
                        <td>Ações</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $id)
                        <tr>
                            <td>{{ $id->name }}</td>
                            <td>{{ $id->description }}</td>
                            <td>
                                <a href='{{ url("/roles/permissions/$id->id") }}' class="btn btn-primary btn-sm">Permissões</a> &nbsp; | &nbsp;
                                <a href='{{ url("/roles/edit/$id->id") }}' class="btn btn-warning btn-sm">Editar</a> &nbsp; | &nbsp;
                                <a href='{{ url("/roles/destroy/$id->id") }}' class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3" class="text-center">{!! $roles->render() !!}</td>
                    </tr>
                    </tfoot>
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