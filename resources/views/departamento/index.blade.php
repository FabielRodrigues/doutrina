@extends('layouts.admin_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Departamentos
            <small>Lista de departamentos.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Lista de departamentos.</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">
                        <a href="{{ url('departamento/create') }}" class="btn btn-success btn-sm">CADASTRAR</a>
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
                    <div class="alert alert-danger">
                        <strong>{{ session('status') }}</strong>
                    </div>
                @endif
                <table class="table table-striped table-bordered" id="tabela">
                    <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Sigla</td>
                        <td>Ações</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listarDepartamentos as $ld)

                        <tr>
                            <td>{{ $ld->name }}</td>
                            <td>{{ $ld->sigla }}</td>
                            <td>
                                <a href='{{ url("departamento/edit/$ld->id") }}' class="btn btn-warning btn-sm">Editar</a>
                                &nbsp; | &nbsp;
                                <a href='{{ url("departamento/destroy/$ld->id") }}' class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
    </div>

@endsection