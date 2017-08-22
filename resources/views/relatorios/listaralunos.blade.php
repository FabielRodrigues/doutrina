@extends('layouts.admin_template')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Relatórios
            <small>Lista de alunos por turma.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Relatórios</a></li>
            <li><a href="#"> Listar turmas</a></li>
            <li class="active">Lista de alunos por turma.</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">


        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <?php try { ?>
                <h3 class="box-title">
                    Lista de alunos do curso <strong>
                        <?php
                            echo $alunosporturma[0]['curso']." - ".$alunosporturma[0]['ciclo']." - ".$alunosporturma[0]['turma'];
                        ?>
                    </strong>
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>

            </div><!-- .box-header with-border -->

            <div class="box-body">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Nascimento</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>Endereço</th>
                            <th><i class="fa fa-eye"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>

                        <?php foreach($alunosporturma as $apt): ?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $apt->name }}</td>
                                <td>{{ $apt->nascimento }}</td>
                                <td>{{ $apt->telefone }}</td>
                                <td>{{ $apt->email }}</td>
                                <td>{{ $apt->endereco }} -  {{ $apt->complemento }} - {{ $apt->cidade }} - {{ $apt->estado }} - {{ $apt->cep }}</td>
                                <td><a href='{{ url("aluno/profile/$apt->users_id") }}'><i class="fa fa-search"></i></a></td>
                            </tr>

                            <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" align="center">
                                <strong>
                               <?php
                                    echo $alunosporturma[0]['curso']." - ".$alunosporturma[0]['ciclo']." - ".$alunosporturma[0]['turma'];
                               ?>
                                </strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <?php
                } catch(Exception $e) {
                    echo "<br /><br />
                        <div class='alert alert-danger'>
                            <strong>Essa turma não tem alunos.</strong>
                        </div>
                    ";
                }
                ?>

            </div><!-- .box-body -->


        </div>

    </section>

@endsection