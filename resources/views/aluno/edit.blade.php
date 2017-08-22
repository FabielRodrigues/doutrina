@extends('layouts.admin_template')

@section('content')
    <section class="content-header">
        <h1>
           Editar o aluno {{ $alunos->name }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Cursos</a> </li>
            <li class="active">Editar cursos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="box box-warning">
            <div class="box-body">
                {!! Form::model($alunos, array('url' => array('/aluno/update', $alunos->id), 'method'=>'get')) !!}

                @include('aluno._form')

                <div class="box box-body">
                    <div class="form-group">
                        {!! Form::submit('Enviar', array('class'=> 'btn btn-success')) !!} &nbsp;|&nbsp;
                        {!! Form::button('Voltar', array('class'=> 'btn btn-info','onclick'=>'history.back(-1)')) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>

    </section><!-- /.content -->


@endsection