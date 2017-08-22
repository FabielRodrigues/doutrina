@extends('layouts.admin_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Frequência
            <small>Lista de turmas.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i>Frequência</i></a> </li>
            <li><a href="#"><i>Chamadas anteriores</i></a> </li>
            <li class="active">Editar chamada.</li>
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

                {!! Form::model($frequencias, array('url' => array('/frequencia/update', $frequencias->id), 'method'=>'get')) !!}
                <div class="form-group">
                    <select name="users_id" class="form-control">
                        <option value="<?php echo $frequencias->users_id; ?>" disabled selected><?php echo $frequencias->users->name; ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label> <input type="radio" checked  name="presente" value='presente' /> Presente</label>
                </div>
                <div class="form-group">
                    <label> <input type="radio"  name="presente" value='falta' /> Faltou</label>
                </div>
                <div class="form-group">
                    <label> <input type="radio"  name="presente" value='falta_justificada' /> Falta Justificada</label>
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

    </section>

@endsection