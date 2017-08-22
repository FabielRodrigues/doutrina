@extends('layouts.admin_template')

@section('content')
    <section class="content-header">
        <h1>
            Editar monitor
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Monitores</a></li>
            <li><a href="#">Lista de monitores</a> </li>
            <li class="active">Editar monitor</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="box box-warning">
            <div class="box-body">
                {!! Form::model($users, array('url' => array('monitores/update', $users->id), 'method'=>'get')) !!}
                @include('users._form')
                {!! Form::close() !!}
            </div>

        </div>

    </section>
@endsection
