@extends('layouts.admin_template')

@section('content')
    <section class="content-header">
        <h1>
            Editar Permissão
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Permissões</a></li>
            <li class="active">Editar permissão</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="box box-warning">
            <div class="box-body">
                {!! Form::model($permission, array('url' => array('permissions/update', $permission->id), 'method'=>'put')) !!}

                @include('permissions._form')

                {!! Form::close() !!}
            </div>
        </div>

    </section><!-- /.content -->


@endsection