@extends('layouts.admin_template')

@section('content')
    <section class="content-header">
        <h1>
            EDITAR USUÁRIO
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Usuários</a></li>
            <li><a href="#">Lista de usuários</a> </li>
            <li class="active">Editar usuário</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="box box-warning">
            <div class="box-body">
                {!! Form::model($users, array('url' => array('users/update', $users->id), 'method'=>'get')) !!}
                    @include('users._form')
                {!! Form::close() !!}
            </div>

        </div>

    </section>
@endsection
