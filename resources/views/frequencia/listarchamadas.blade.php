@extends('layouts.admin_template')

@section('content')

<section class="content-header">
    <h1>
        Listas de chamadas anteriores
        <small>Escolha a turma que deseja realizar a chamada.</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Relatórios</a></li>
        <li><a href="#">Realizar frequência do AED.</a></li>
        <li class="active">Lista de chamadas anteriores</li>

    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        @if (session('status'))
                            <div class="alert alert-danger">
                                <strong>{{ session('status') }}</strong>
                            </div>
                        @endif

                        @foreach($frequencia as $item)
                            <div class="col">
                                <div class="col-xs-1 col-md-1 text-center">
                                    <div class="thumbnail">
                                        <span class="glyphicon glyphicon-calendar" style="font-size: 2.5em; margin: 5px;"></span><br />
                                        <a href='{{ url("/frequencia/editarchamada/$item->data ")}}' title="Listar alunos desta chamada">
                                            <strong>
                                                <?php
                                                $data = new DateTime($item->data);
                                                echo $data->format('d/m/Y');
                                                ?>
                                            </strong><!-- EDITAR -->
                                        </a>
                                        <div class="text-center "> <!-- EXCLUIR -->
                                            <a href="{{ url("/frequencia/destroy/$item->turma_id/$item->data") }}" onclick="return confirm('Tem certeza?')" title="Excluir esta chamada" class="text-red"><strong>EXCLUIR</strong></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection