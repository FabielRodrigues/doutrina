@extends('layouts.admin_template')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Usuários
            <small>Usuários do sistema.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Usuários</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                @can('Editar usuários')
                    <h3 class="box-title"><a href="{{ url('users/create') }}" class="btn btn-success btn-sm">CADASTRAR</a></h3>
                @endcan
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
                        <td>Nome</td>
                        <td>E-mail</td>
                        <td>Ações</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if (Auth::user()->id != $user->id)
                                @else
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal">Foto</button>
                                    &nbsp;|&nbsp;
                                    <a href="{{ url("users/password/$user->id") }}" class="btn btn-success btn-sm">Alterar senha</a>
                                    &nbsp;|&nbsp;
                                @endif
                                @can('Editar usuários')
                                    <a href='{{ url("users/edit/$user->id") }}' class="btn btn-primary btn-sm">Editar</a>
                                    &nbsp;|&nbsp;
                                @endcan
                                @can('Deletar usuários')
                                    <a href="{{ url("users/destroy/$user->id") }}" class="btn btn-danger btn-sm">Excluir</a>
                                &nbsp;|&nbsp;
                                @endcan
                                @can('Menu funções')
                                    <a href="{{ url("users/roles/$user->id") }}" class="btn btn-default btn-sm">Funções</a>
                                @endcan
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade modal-primary" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Atualizar foto do perfil</h4>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Current avatar -->

                                        <img class="img-responsive img-circle avatar-view" src="{{ url('/') }}/uploads/avatars/{{ $user->avatar }}" alt="Avatar" title="Change the avatar">
                                        <br />
                                        {{--<a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>--}}
                                        <form enctype="multipart/form-data" action="{{ url('users/profile') }}" method="post">
                                            <input type="file" name="avatar" class="form-control">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <br />
                                            <input type="submit" class="pull-right btn btn-sm btn-success">
                                        </form>
                                        <br />

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- fim Modal -->

                            @endforeach
                            </tbody>
                </table>

            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
    </div>
@endsection