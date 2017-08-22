@extends('layouts.admin_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Realizar chamada
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('/frequencia') }}"><i> Frequência</i></a></li>
            <li class="active"> Realizar chamada</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">

            <div class="box-body">
                @if (session('status'))
                    <div class="alert alert-danger">
                        <strong>{{ session('status') }}</strong>
                    </div>
                @endif
                <table class="table table-striped table-bordered">
                    <thead>
                    {!! Form::open(array('url' => '/frequencia/storechamada')) !!}
                    <tr valign="middle">
                        <td colspan="1">
                            <div class="input-group">
                                <label> Informe a data:</label>
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" placeholder="<?php echo date('d/m/Y');?>" name="data" id="date2" class="form-control datepicker" required />
                            </div>
                        </td>
                        <td colspan="1">
                            <div class="input-group">
                                <label>P = Presente. F = Falta. F.J = Falta Justificada.</label>
                            </div>
                        </td>
                    </tr>
                    <tr align="center">
                        <th>Nome</th>
                        <th><span class="glyphicon glyphicon-ok"></span></th>
                        <th><span class="glyphicon glyphicon-remove"></span></th>
                        <th><span class="glyphicon glyphicon-saved"></span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1;?>
                    @foreach($alunos as $aluno)

                        <tr>
                            <td>
                                {{ $aluno->name }}
                                <input type="hidden" name="turma_id" value="{{ $id }}" />
                                <input type="hidden" name="users_id[<?php echo $i; ?>]" value="{{ $aluno->id }}" />
                            </td>
                            <td><label> <input type="radio" checked  name="presente[<?php echo $i; ?>]" value='presente' /> P.</label></td>
                            <td><label> <input type="radio"  name="presente[<?php echo $i; ?>]" value='falta' /> F.</label></td>
                            <td><label> <input type="radio"  name="presente[<?php echo $i; ?>]" value='falta_justificada' /> F.J</label></td>
                        </tr>
                    <?php $i ++; ?>
                    @endforeach
                    </tbody>
                </table>
                    <br />
                <div class="box box-body">
                    <div class="form-group">
                        {!! Form::submit('Enviar', array('class'=> 'btn btn-success')) !!} &nbsp;|&nbsp;
                        {!! Form::button('Voltar', array('class'=> 'btn btn-info','onclick'=>'history.back(-1)')) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
    </div>

@endsection
@section('view.scripts')
    <script type="text/javascript">
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR'
        });
    </script>

@endsection