@extends('layouts.admin_template')

@section('content')
    <section class="content-header">
        <h1>
            Lista de cursos do aluno <strong>{{ $aluno->name }}</strong>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Alunos</a> </li>
            <li class="active">Cursos aluno</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->

        <div class="box-body">


            {!! Form::open(array('url' => array('/aluno/storecursos', $id), 'method'=>'get')) !!}

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Vincular o aluno ao curso</h3>
                </div>
                <div class="box-body">
                    @include('aluno._curso')
                </div>
            </div>

            <div class="box box-body">
                <div class="form-group">
                    {!! Form::submit('Enviar', array('class'=> 'btn btn-success')) !!} &nbsp;|&nbsp;
                    {!! Form::button('Voltar', array('class'=> 'btn btn-info','onclick'=>'history.back(-1)')) !!}
                </div>
            </div>

            {!! Form::close() !!}
            <div class="box box-primary">
                <div class="box-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Curso</th>
                            <th>Ciclo</th>
                            <th>Turma</th>
                            <th>Desvincular curso</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cursos as $c)

                            <tr>
                                <td>{{ $c->name_curso }}</td>
                                <td>{{ $c->name_ciclo }}</td>
                                <td>{{ $c->turma }}</td>
                                <td><a href='{{ url("aluno/revokecursos",['id' => $c->users_id, 'turmas_id' => $c->turmas_id]) }}' class="btn btn-danger btn-sm">Desvincular</a></td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </section><!-- /.content -->


@endsection