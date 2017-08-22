@extends('layouts.admin_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Monitores
            <small>Lista de monitores.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Lista de monitores.</li>
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
                <table class="table table-striped table-bordered" id="tabela">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Nascimento</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Curso</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($monitores as $mt)
                        <?php
                                $curso = $mt->listarMonitores($mt->id);


                        ?>
                        <tr>
                            <td>{{ $mt->name }}</td>
                            <td>{{ $mt->nascimento }}</td>
                            <td>{{ $mt->email }}</td>
                            <td>{{ $mt->telefone }}</td>
                            <td>
                                @foreach($curso as $cs)
                                    {{ $cs->sigla }} - {{ $cs->ciclo_name }} {{ $cs->curso_name }} - {{ $cs->turma }} <br />
                                @endforeach
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