@extends('layouts.admin_template')

@section('content')
    <section class="content-header">
        <h1>
            Ciclo
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Ciclos</a> </li>
            <li class="active">Editar ciclo</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="box box-warning">
            <div class="box-body">
                {!! Form::model($ciclo, array('url' => array('/ciclo/update', $ciclo->id), 'method'=>'get')) !!}

                @include('ciclo._form')

                {!! Form::close() !!}
            </div>
        </div>

    </section><!-- /.content -->


@endsection