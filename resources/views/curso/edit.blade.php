@extends('layouts.admin_template')

@section('content')
    <section class="content-header">
        <h1>
            CURSOS
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
                {!! Form::model($curso, array('url' => array('/curso/update', $curso->id), 'method'=>'get')) !!}

                @include('curso._form')

                {!! Form::close() !!}
            </div>
        </div>

    </section><!-- /.content -->


@endsection