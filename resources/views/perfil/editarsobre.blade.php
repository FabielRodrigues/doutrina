@extends('layouts.admin_template')

@section('content')
    <section class="content-header">
        <h1>
            Editar informações pessoais
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Meu perfil</a> </li>
            <li class="active">Editar informações pessoais</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->

        <div class="box-body">

            {!! Form::model($adultos, array('url' => array('/perfil/updatesobre'))) !!}

            <input type="hidden" name="id" value="{{ $adultos->id }}" />
            <div class="box box-primary">
                <div class="box-body">
                    @include('aluno._adulto')
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