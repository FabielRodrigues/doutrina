@extends('layouts.admin_template')

@section('content')
    <section class="content-header">
        <h1>
            Cadastrar permissão
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Permissões</a></li>
            <li class="active">Cadastrar permissão</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="box box-warning">
            <div class="box-body">
                {!! Form::open(array('url' => 'permissions/store','files' => true)) !!}

                @include('permissions._form')

                {!! Form::close() !!}
            </div>
        </div>

    </section><!-- /.content -->


@endsection