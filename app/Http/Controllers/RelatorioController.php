<?php

namespace Doutrina\Http\Controllers;

use Doutrina\Models\Frequencia;
use Doutrina\Models\Turma;
use Doutrina\Models\User;
use Doutrina\Models\UserTurma;
use Illuminate\Http\Request;
use DB;
use Doutrina\Http\Requests;
use Illuminate\Support\Facades\Auth;

class RelatorioController extends Controller
{
    //
    protected $turma;
    protected $frequencia;
    protected $alunos;
    protected $userTurma;
    protected $user;

    public function __construct(User $user, Turma $turma, Frequencia $frequencia, User $alunos, UserTurma $userTurma)
    {
        $this->turma      = $turma;
        $this->frequencia = $frequencia;
        $this->alunos     = $alunos;
        $this->userTurma  = $userTurma;
        $this->user = $user;
    }

    public function listarTurmas()
    {
        $listarTurmas = $this->turma->select()
            ->join('ciclos', 'ciclos.id', '=', 'turmas.ciclos_id')
            ->join('cursos', 'cursos.id', '=', 'ciclos.cursos_id')
            ->join('monitor_turmas', 'monitor_turmas.turma_id','=', 'turmas.id')
            ->select('turmas.*', 'ciclos.name as ciclo_name', 'cursos.name as curso_name')
            ->where('monitor_turmas.user_id',Auth::user()->id)
            ->get();
        $listar = json_decode($listarTurmas);
        return view('relatorios/listarturmas', compact('listar'));
    }

    public function relatorioPeriodico($id)
    {
        $turma = $this->turma->select()
            ->join('ciclos', 'ciclos.id', '=', 'turmas.ciclos_id')
            ->join('cursos', 'cursos.id', '=', 'ciclos.cursos_id')
            ->select('turmas.turma', 'ciclos.name as ciclo_nome', 'cursos.name as curso_nome')
            ->where('turmas.id', $id)->first();
        return view('relatorios/relatorioperiodico', compact('turma', 'id'));
    }

    public function resultadorelatorioperiodico(Request $request)
    {
        $nometurma    = $request->turma;
        $datainit = explode('/', $request->dtainicial);
        $datafim = explode('/', $request->dtafinal);
        $novadatainicial = $datainit[2]."-".$datainit[1]."-".$datainit[0];
        $novadatafinal = $datafim[2]."-".$datafim[1]."-".$datafim[0];

        $grafico      = $this->frequencia->select()
                                         ->whereBetween('data', array($novadatainicial, $novadatafinal))
                                         ->where('turma_id', $request->turma_id)->get();

        $totaldias    = $this->frequencia->select()
                                         ->whereBetween('data', array($novadatainicial, $novadatafinal))
                                         ->where('turma_id', $request->turma_id)
                                         ->groupBy('data')->get();

        $frequencias = $this->frequencia
                            ->select('users_id', DB::raw('SUM(presente) as total_presente'),
                                                 DB::raw('SUM(falta) as total_falta'),
                                                 DB::raw('SUM(falta_justificada) as total_faltas_justificadas'))
                            ->where('turma_id', $request->turma_id)
                            ->whereBetween('data', array($novadatainicial, $novadatafinal))
                            ->groupBy('users_id')->get();

        $novadatainicial = $datainit[0]."/".$datainit[1]."/".$datainit[2];
        $novadatafinal = $datafim[0]."/".$datafim[1]."/".$datafim[2];

        return view('relatorios/resultadorelatorioperiodico', compact('grafico','frequencias','totaldias', 'nometurma', 'novadatainicial','novadatafinal'));
    }

    public function listaralunos($id)
    {

        $alunosporturma = $this->userTurma->select()
            ->join('turmas', 'turmas.id','=','user_turmas.turmas_id')
            ->join('users', 'users.id', '=', 'user_turmas.users_id')
            ->join('adultos', 'adultos.users_id', '=', 'users.id')
            ->join('enderecos', 'enderecos.users_id', '=', 'users.id')
            ->join('ciclos', 'ciclos.id','=','turmas.ciclos_id')
            ->join('cursos', 'cursos.id', '=','ciclos.cursos_id')
            ->select('user_turmas.*','turmas.*', 'users.*', 'adultos.*', 'ciclos.name as ciclo', 'cursos.name as curso', 'enderecos.*')
            ->where('turmas.id', $id)
            ->orderBy('users.name', 'asc')
            ->get();
        //dd($alunosporturma);

        return view('relatorios/listaralunos', compact('alunosporturma'));
    }

    public function relatoriomonitores()
    {
        $monitores = $this->user->select()
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('users.*', 'role_user.*', 'roles.name as n')
            ->whereNull('users.deleted_at')
            ->where('roles.name', '=', 'Monitor')
            ->orderBy('users.name', 'asc')
            ->get();

        return view('relatorios/relatoriomonitores', compact('monitores'));
    }


}
