@extends('layouts.admin_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Vincular monitor ao curso
            <small>Vincular monitor ao curso.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Monitores</a> </li>
            <li><a href="#"> Listar monitores</a> </li>
            <li class="active">Vincular monitor ao curso.</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    @if (session('status'))
        <div class="alert alert-info">
            <strong>{{ session('status') }}</strong>
        </div>
    @endif
    <!-- Default box -->

        <div class="box-body">
            {!! Form::open(array('url' => '/monitores/vincularstore')) !!}

            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Lista de ciclos</h3>
                </div>
                <div class="box-body">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input type="hidden" name="user_id" value="{{ $id }}">
                        {!! Form::label('Turma - Ciclo') !!}
                        <select name="turma_id" class="form-control">
                        @foreach($turmas as $turma)
                            <option value="{{ $turma->id }}">{{ $turma->curso }} - {{ $turma->ciclo }} - {{ $turma->turma }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Enviar', array('class'=> 'btn btn-success btn-sm')) !!} &nbsp;|&nbsp;
                        {!! Form::button('Voltar', array('class'=> 'btn btn-info btn-sm','onclick'=>'history.back(-1)')) !!}
                    </div>

                </div>

                {!! Form::close() !!}

                <div class="box-header with-border">
                    <h3 class="box-title">Turmas vinculadas</h3>
                </div>

                <div class="box-body">
                    <table class="table">
                        <tr>
                            <th>Curso</th>
                            <th>Ciclo</th>
                            <th>Turma</th>
                            <th>Ação</th>
                        </tr>
                        @foreach($listaTurmaMonitores as $listaTurmaMonitor)
                            <tr>
                                <td>{{ $listaTurmaMonitor->curso }}</td>
                                <td>{{ $listaTurmaMonitor->ciclo }}</td>
                                <td>{{ $listaTurmaMonitor->turma }}</td>
                                <td><a href='{{ url("monitores/vincularRevoke/$listaTurmaMonitor->idmonitor") }}' class="btn btn-danger btn-sm">Desvincular</a> </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>


        </div>

    </section>

@endsection