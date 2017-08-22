@extends('layouts.admin_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Meu perfil
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="#"> Meu perfil</a> </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if (session('status'))
            <div class="alert alert-info">
                <strong>{{ session('status') }}</strong>
            </div>
    @endif
    <!-- Default box -->
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">

                    <div class="box-body box-profile">

                        <a href="#" data-toggle="modal" data-target="#myModal" alt="Clique para atualizar a foto.">
                            <img class="profile-user-img img-responsive img-circle" src='{{ url("/uploads/avatars/$user->avatar") }}' title="Editar foto" alt="User profile picture">
                        </a>
                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <p class="text-muted text-center"><?php echo Auth::user()->roles[0]['name']; ?></p>
                        <p class="text-muted text-center"><strong>{{ $user->email }}</strong></p>
                        <br />
                        <p class="text-center">
                            <a href='{{ url("perfil/editaremail") }}' class="btn btn-info btn-sm">Editar e-mail</a>
                        </p>
                        <p class="text-center">
                            <a href='{{ url("perfil/alterarsenha") }}' class="btn btn-warning btn-sm">Alterar Senha</a>
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <div class="col-xs-6">
                            <h3 class="box-title">Sobre</h3>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href='{{ route('perfil.editarsobre') }}'>Editar</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        @foreach($adultos as $adulto)

                            <p><strong>CPF:</strong> {{ $adulto->cpf }}</p>
                            <p><strong>Telefone:</strong> {{ $adulto->telefone }}</p>
                            <p><strong>Celular:</strong> {{ $adulto->celular }}</p>
                            <p><strong>Sexo:</strong> {{ $adulto->sexo }}</p>
                            <p><strong>Nascimento:</strong>{{ $adulto->nascimento }}</p>
                            <p><strong>Formação:</strong> {{ $adulto->formacao }}</p>
                            <p><strong>Profissão:</strong> {{ $adulto->profissao }}</p>
                            <p><strong>Habilidade:</strong> {{ $adulto->habilidade }}</p>

                        @endforeach

                    </div>

                </div>

                <div class="box box-primary">

                    <div class="box-header with-border">
                        <div class="col-xs-6">
                            <h3 class="box-title">Endereço</h3>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a href='{{ route('perfil.editarendereco') }}'>Editar</a>
                        </div>
                    </div>

                    <div class="box-body">

                        @foreach($enderecos as $endereco)

                            <p><strong>Logradouro:</strong> {{ $endereco->endereco }}</p>
                            <p><strong>Complemento:</strong> {{ $endereco->complemento }}</p>
                            <p><strong>Cidade:</strong> {{ $endereco->cidade }}</p>
                            <p><strong>Estado:</strong> {{ $endereco->estado }}</p>
                            <p><strong>CEP:</strong> {{ $endereco->cep }}</p>

                        @endforeach

                    </div>

                </div>

                <div class="box box-primary">

                    <div class="box-header with-border">
                        <div class="col-xs-8">
                            <h4 class="box-title">Cursos</h4>
                        </div>
                    </div>

                    <div class="box-body">

                        @foreach($cursos as $c)
                            <p>
                                <span class="label label-danger">{{ $c->name_curso }}</span>
                                <span class="label label-success">{{ $c->name_ciclo }}</span>
                                <span class="label label-info">{{ $c->turma }} - {{$c->ano }}</span><br />
                            </p>
                        @endforeach

                    </div>

                </div>
                <a href="#" onclick="window.history.back()" class="btn btn-sm btn-info">Voltar</a>

            </div> <!-- .col-md-3 -->
        </div>
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
                        <form enctype="multipart/form-data" action="{{ url('users/update_avatar') }}" method="post">
                            <input type="file" name="avatar" class="form-control">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
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

    </section>

@endsection