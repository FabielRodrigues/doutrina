@extends('layouts.admin_template')

@section('content')
    <section class="content-header">
        <h1>
            DEPARTAMENTOS
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Departamentos</a> </li>
            <li class="active">Editar departamentos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="box box-warning">
            <div class="box-body">
                {!! Form::model($departamento, array('url' => array('/departamento/update', $departamento->id), 'method'=>'get')) !!}

                @include('departamento._form')

                {!! Form::close() !!}
            </div>
        </div>

    </section><!-- /.content -->


@endsection