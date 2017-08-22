@extends('layouts.admin_template')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Logs do sistema
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Lista de logs.</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Usuário</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($activity as $at)
                        <tr>
                            <td>{{ $at->created_at->diffForHumans() }}</td>
                            <td>{{ $at->description }}</td>
                            <td>{{ $at->user->name }}</td>
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

    </section>
    <!-- /.content -->

@endsection