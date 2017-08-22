@extends('layouts.admin_template')

@section('content')
    <section class="content-header">
        <h1>
            Editar informações de endereço
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Meu perfil</a> </li>
            <li class="active">Editar informações de endereço</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->

        <div class="box-body">

            {!! Form::model($enderecos, array('url' => array('/perfil/updateendereco'), 'method'=>'get')) !!}

            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $enderecos->id }}" />
            <div class="box box-primary">
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