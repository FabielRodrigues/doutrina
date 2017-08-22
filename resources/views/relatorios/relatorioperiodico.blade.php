@extends('layouts.admin_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Relatórios
            <small>Lista as turmas para realização da um relatório.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Relatórios.</li>
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

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                {!! Form::open(array('url' => '/relatorios/resultadorelatorioperiodico')) !!}

                                <div class="box box-body">
                                    <div class="form-group">
                                        <input type="hidden" name="turma_id" value="{{ $id }}" />
                                        <input type="hidden" name="turma" value="{{ $turma->turma }}" />
                                        <input type="text" class="form-control" name="nometurma" value="{{ $turma->curso_nome }} - {{ $turma->ciclo_nome }} - {{ $turma->turma }}" disabled>
                                    </div>
                                </div>

                                <div class="box box-body">
                                    <div class="form-group">
                                        <label>Escolha a data inicial do relatório:</label>
                                        <input type="text" name="dtainicial" placeholder="Data inicial" required class="form-control date"/>
                                    </div>
                                </div>

                                <div class="box box-body">
                                    <div class="form-group">

                                    <label>Escolha a data final do relatório:</label>
                                    <input type="text" name="dtafinal" placeholder="Data final" required class="form-control date" />

                                    </div>
                                </div>

                                <div class="box box-body">
                                    <div class="form-group">
                                        {!! Form::submit('Enviar', array('class'=> 'btn btn-success')) !!} &nbsp;|&nbsp;
                                        {!! Form::button('Voltar', array('class'=> 'btn btn-info','onclick'=>'history.back(-1)')) !!}
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

@endsection
@section('view.scripts')
    <script type="text/javascript">
        jQuery(function($) {

            $(".date").mask("99/99/9999");
        });
    </script>

@endsection