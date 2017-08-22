@extends('layouts.admin_template')

@section('content')
    <section class="content-header">
        <h1>
            Turma
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Turmas</a> </li>
            <li class="active">Editar turma</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="box box-warning">
            <div class="box-body">
                {!! Form::model($turma, array('url' => array('/turma/update', $turma->id), 'method'=>'get')) !!}

                @include('turma._form')

                {!! Form::close() !!}
            </div>
        </div>

    </section><!-- /.content -->


@endsection