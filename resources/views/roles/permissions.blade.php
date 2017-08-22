@extends('layouts.admin_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Funções
            <small>Lista de funções no sistema.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Funções</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Permissão da função de : {{ $roles->name }}</h3>
                <br /><br />
                <h3 class="box-title">Adicionar nova permissão</h3>
                <br /><br />
                {!! Form::open(['url' => ['roles/permissionstore', $roles->id]]) !!}
                <div class="form-group">
                    <select name="permission_id" class="form-control">
                        @foreach($permissions as $per)
                            <option value="{{ $per->id }}">{{ $per->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {!! Form::submit('Enviar', array('class'=> 'btn btn-success')) !!} &nbsp;|&nbsp;
                    {!! Form::button('Voltar', array('class'=> 'btn btn-info','onclick'=>'history.back(-1)')) !!}
                </div>
                {!! Form::close() !!}

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                @if (session('status'))
                    <div class="alert alert-info">
                        <strong>{{ session('status') }}</strong>
                    </div>
                @endif
                <table class="table table-striped table-bordered" id="tabela">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($roles->permissions as $id)
                        <tr>
                            <td>{{ $id->name }}</td>
                            <td>{{ $id->description }}</td>
                            <td>
                                <a href='{{ url("/roles/permissionrevoke",['id' => $roles->id, 'permission_id' => $id->id]) }}' class="btn btn-danger btn-sm">Revogar permissão</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
    </div>
@endsection