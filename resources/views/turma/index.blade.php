@extends('layouts.admin_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Turmas
            <small>Lista de turmas.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Lista de turmas.</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                @can('Cadastrar turma')
                <h3 class="box-title">
                        <a href="{{ url('turma/create') }}" class="btn btn-success btn-sm">CADASTRAR</a>
                </h3>
                @endcan

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
                        <th>Turma</th>
                        <th>Ciclo</th>
                        <th>Curso</th>
                        <th>Vagas</th>
                        <th>Dia</th>
                        <th>Horário</th>
                        <th>Ano</th>
                        @can('Visualizar turma')
                        <th>Visualizar alunos</th>
                        @endcan
                        @can('Editar turma')
                        <th>Editar</th>
                        @endcan
                        @can('Deletar turma')
                        <th>Deletar</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listarTurmas as $cr)

                        <tr>
                            <td>{{ $cr->turma }}</td>
                            <td>{{ $cr->ciclo_name }}</td>
                            <td>{{ $cr->curso_name }}</td>
                            <td>{{ $cr->vagas }}</td>
                            <td>{{ $cr->dia }}</td>
                            <td>{{ $cr->horario }}</td>
                            <td>{{ $cr->ano }}</td>
                            @can('Visualizar turma')
                            <td>
                                <a href='{{ url("turma/alunos/$cr->id") }}' class="btn btn-info btn-sm">Visualizar alunos</a>
                            </td>
                            @endcan
                            @can('Editar turma')
                            <td>
                                <a href='{{ url("turma/edit/$cr->id") }}' class="btn btn-warning btn-sm">Editar</a>
                            </td>
                            @endcan
                            @can('Deletar turma')
                            <td>
                                <a href='{{ url("turma/destroy/$cr->id") }}' class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                            @endcan
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