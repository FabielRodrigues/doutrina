@extends('layouts.admin_template')

@section('content')
    <section class="content-header">
        <h1>
            CADASTRAR USUÁRIOS
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Usuários</a></li>
            <li><a href="#">Lista de usuários</a> </li>
            <li class="active">Cadastrar usuários</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="box box-warning">
            <div class="box-body">
                        {!! Form::open(array('url' => 'users/store')) !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('Nome') !!}
                            {!! Form::text('name', null, array('class' => 'form-control' )) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('Email') !!}
                            {!! Form::text('email', null, array('class' => 'form-control')) !!}
                            @if ($errors->has('email'))
                                <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('Senha') !!}
                            {!! Form::password('password', array('class' => 'form-control')) !!}
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            {!! Form::label('Confirmar senha:') !!}
                            {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Enviar', array('class'=> 'btn btn-success')) !!} &nbsp;|&nbsp;
                            {!! Form::button('Voltar', array('class'=> 'btn btn-info','onclick'=>'history.back(-1)')) !!}
                        </div>
                        {!! Form::close() !!}

            </div>
        </div>
    </section>


@endsection
