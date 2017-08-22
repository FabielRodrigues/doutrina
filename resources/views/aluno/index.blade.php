@extends('layouts.admin_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Aluno
            <small>Lista de alunos.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Lista de alunos.</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">

                <h3 class="box-title">
                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">CADASTRAR</a>
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
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($alunos as $al)

                        <tr>
                            <td>{{ $al->name }}</td>
                            <td>
                                <a href='{{ url("aluno/profile/$al->id") }}' class="btn btn-info btn-sm">Visualizar</a>
                                &nbsp; | &nbsp;
                                @can('Excluir aluno')
                                <a href='{{ url("aluno/destroy/$al->id") }}' class="btn btn-danger btn-sm">Excluir</a>
                                @endcan
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
        <!-- Modal -->
        <div class="modal fade modal-primary" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Qual é o tipo do aluno que você deseja cadastrar?</h4>
                    </div>
                    <div class="modal-body">
                        <a href="{{ url('aluno/createadulto') }}" class="btn-success btn-block btn">Aluno com e-mail</a><br />
                        <a href="{{ url('aluno/createcrianca') }}" class="btn-warning btn-block btn">Aluno sem e-mail</a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- fim Modal -->

    </section>
    <!-- /.content -->
    </div>

@endsection