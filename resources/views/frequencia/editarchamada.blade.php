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
            <li class="active"> Editar chamada</li>
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
                    <tr align="center">
                        <th>Nome</th>
                        <th>Presente</th>
                        <th>Falta</th>
                        <th>Falta Justificada</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $presente = 0;
                    $falta = 0;
                    $faltajustificada = 0;
                    ?>
                    @foreach($frequencias as $frequencia)
                        <?php
                            $presente += $frequencia->presente;
                            $falta += $frequencia->falta;
                            $faltajustificada += $frequencia->falta_justificada;
                        ?>

                        <tr>
                            <td>
                                {{ $frequencia->users->name }}
                            </td>
                            <th>
                                <?php if($frequencia->presente) { ?>
                                <span class="btn btn-success btn-xs">V</span>
                                <?php } ?>
                            </th>
                            <th>
                                <?php if($frequencia->falta) { ?>
                                <span class="btn btn-danger btn-xs">X</span>
                                <?php } ?>
                            </th>
                            <th>
                                <?php if($frequencia->falta_justificada) { ?>
                                <span class="btn btn-warning btn-xs">-</span>
                                <?php } ?>
                            </th>
                            <th>
                                <a href='{{ url("/frequencia/editar/$frequencia->id") }}' class="btn btn-warning btn-sm">Editar</a>
                            </th>
                @endforeach
                    </tbody>
                    <tfoot>
                        <td class="bg-info">
                            Total:
                        </td>
                        <td class="bg-green">
                            Presente: <?php echo $presente; ?>
                        </td>
                        <td class="bg-red">
                            Falta: <?php echo $falta; ?>
                        </td>
                        <td colspan="2" class="bg-warning">
                            Falta justificada: <?php echo $faltajustificada; ?>
                        </td>
                    </tfoot>
                </table>
                <br />
                <a href='{{ url("/frequencia/listarchamadas/$frequencia->turma_id") }}' class="btn btn-info btn-block">Voltar</a>
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