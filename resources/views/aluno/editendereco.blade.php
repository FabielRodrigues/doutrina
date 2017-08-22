@extends('layouts.admin_template')

@section('content')
    <section class="content-header">
        <h1>
            Cadastrar aluno adulto
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Alunos</a> </li>
            <li class="active">Cadastrar aluno adulto</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->

        <div class="box-body">

            {!! Form::model($enderecos, array('url' => array('/aluno/updateendereco', $enderecos->id), 'method'=>'get')) !!}

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Informações de Endereço</h3>
                </div>
                <div class="box-body">
                    @include('aluno._endereco')
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


    </section><!-- /.content -->


@endsection