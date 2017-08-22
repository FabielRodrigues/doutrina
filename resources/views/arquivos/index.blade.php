@extends('layouts.admin_template')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Arquivos
        <small>Arquivos do sistema</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Lista de alunos.</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
            <!-- The fileinput-button span is used to style the file input field as button -->

                        {!! Form::open(array('url' => '/arquivos/upload', 'files' => true)) !!}
                                <!-- The file input field used as target for the file upload widget -->
                            <div class="form-group">
                                <label for="name">Insira um nome para o arquivo:</label>
                                <input id="name" type="text" class="form-control" required name="name" />
                            </div>

                            <div class="form-group">
                                <label for="ciclo">Escolha o ciclo em que o arquivo vai estar disponível</label>
                                <select id="ciclo" class="form-control" name="ciclo_id">
                                    @foreach($ciclo as $ci)
                                        <option value="{{ $ci->id }}">{{ $ci->name }} - {{ $ci->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="documento">Escolha o arquivo:</label>
                                <input id="documento" type="file" name="documento" required class="btn btn-block" />
                                <input type="hidden" name="token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="userId" value="{{ Auth::User()->id }}" />
                            </div>

                            <div class="box box-body">
                                <div class="form-group">
                                    {!! Form::submit('Enviar', array('class'=> 'btn btn-success')) !!} &nbsp;|&nbsp;
                                    {!! Form::button('Voltar', array('class'=> 'btn btn-info','onclick'=>'history.back(-1)')) !!}
                                </div>
                            </div>

                            {!! Form::close() !!}


            <br>
            <br>
            <!-- The global progress bar -->
            <div id="progress" class="progress">
                <div class="progress-bar progress-bar-success"></div>
            </div>

            @if(Session::has('success'))
                <div class="alert alert-success">
                    {!! Session::get('success') !!}
                </div>
            @endif

            <div class="alert alert-success hide" id="upload-success">
                Upload realizado com sucesso!
            </div>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Enviado em</th>
                    <th>Usuário</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $file)
                    <tr>
                        <td>{!! $file->name !!}</td>
                        <td>{!! $file->created_at !!}</td>
                        <td>{!! $user->name !!}</td>
                        <td>
                            <a href='{{ url("arquivos/download/$file->id") }}' class="btn btn-xs btn-success">download</a>
                            <a href='{{ url("arquivos/destroy/$file->id") }}' class="btn btn-xs btn-danger">excluir</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-body">
            @if (session('status'))
                <div class="alert alert-danger">
                    <strong>{{ session('status') }}</strong>
                </div>
            @endif

        </div>

    </div>

</section>
@endsection