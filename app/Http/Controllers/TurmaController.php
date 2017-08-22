<?php

namespace Doutrina\Http\Controllers;

use Doutrina\Models\Ciclo;
use Doutrina\Models\Monitor_turma;
use Doutrina\Models\Turma;
use Doutrina\Models\Departamento;
use Doutrina\Models\UserTurma;
use Illuminate\Http\Request;

use Doutrina\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TurmaController extends Controller
{
    //
    protected $turma;
    protected $userTurma;
    protected $ciclo;
    protected $departamentos;

    public function __construct(Turma $turma, Ciclo $ciclo, Departamento $departamentos, UserTurma $userTurma)
    {
        $this->middleware('auth');
        $this->turma = $turma;
        $this->ciclo = $ciclo;
        $this->departamentos = $departamentos;
        $this->userTurma = $userTurma;
    }

    public function index()
    {
        $listarTurmas = $this->turma->select()
            ->join('ciclos', 'ciclos.id', '=', 'turmas.ciclos_id')
            ->join('cursos', 'cursos.id', '=', 'ciclos.cursos_id')
            ->join('monitor_turmas', 'monitor_turmas.turma_id','=', 'turmas.id')
            ->select('turmas.*', 'ciclos.name as ciclo_name', 'cursos.name as curso_name')
            ->where('monitor_turmas.user_id', Auth::user()->id)
            ->get();

        return view('turma/index', compact('listarTurmas'));
    }

    public function create()
    {
        $listarciclos = $this->ciclo->select()
            ->join('cursos', 'cursos.id','=', 'ciclos.cursos_id')
            ->select('ciclos.name as ciclo', 'ciclos.id', 'cursos.name as curso')
            ->get();
        return view('turma/create', compact('listarciclos'));
    }

    public function store(Request $request)
    {
        $turma = $this->turma->create([
            'ciclos_id' => $request->ciclos_id,
            'turma' => $request->turma,
            'horario' => $request->horario,
            'dia' => $request->dia,
            'ano' => $request->ano,
            'sala' => $request->sala,
            'vagas' => $request->vagas
        ]);

        $turma->save();

        Monitor_turma::create([
            'turma_id' => $turma->id,
            'user_id'  => Auth::User()->id
        ]);

        return redirect('turma')->with('status', 'Turma cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $listarciclos = $this->ciclo->select()
            ->join('cursos', 'cursos.id','=', 'ciclos.cursos_id')
            ->select('ciclos.name as ciclo', 'ciclos.id', 'cursos.name as curso')
            ->get();
        $turma = $this->turma->find($id);
        return view('turma/edit', compact('turma', 'listarciclos'));
    }

    public function update(Request $request, $id)
    {
        $this->turma->find($id)->update($request->all());
        return redirect('turma')->with('status', 'Turma atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $this->turma->find($id)->delete();
        return redirect('turma')->with('status', 'Turma deletado com sucesso!');
    }

    public function alunos($id)
    {
        $alunos = $this->userTurma->select()
            ->join('users', 'users.id', '=', 'user_turmas.users_id')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('users.*', 'role_user.*', 'roles.name as aluno')
            ->whereNull('users.deleted_at')
            ->where('roles.name', '=', 'Aluno')
            ->where('user_turmas.turmas_id', $id)
            ->orderBy('users.name', 'ASC')
            ->get();

        return view('turma/alunos', compact('alunos'));
    }
}