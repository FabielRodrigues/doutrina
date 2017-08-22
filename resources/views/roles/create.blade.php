@extends('layouts.admin_template')

@section('content')
    <section class="content-header">
        <h1>
            Cadastrar função
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Funções</a></li>
            <li class="active">Cadastrar função</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="box box-warning">
            <div class="box-body">
                {!! Form::open(array('url' => 'roles/store','files' => true)) !!}

                @include('roles._form')

                {!! Form::close() !!}
            </div>
        </div>

    </section><!-- /.content -->


@endsection