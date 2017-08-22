<?php

namespace Doutrina\Http\Controllers;

use Doutrina\Http\Requests;
use Doutrina\Models\Adulto;
use Doutrina\Models\Frequencia;
use Doutrina\Models\User;
use Doutrina\Models\Curso;
use Doutrina\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $user;
    protected $curso;
    protected $turma;
    protected $frequencia;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Curso $curso, Turma $turma, Frequencia $frequencia)
    {
        $this->users = $user;
        $this->curso = $curso;
        $this->turma = $turma;
        $this->frequencia = $frequencia;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('auth');
        $alunos = $this->users->select()
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('users.*', 'role_user.*', 'roles.name as n')
            ->whereNull('deleted_at')
            ->where('roles.name', '=', 'Aluno')->get();
        $cursos = $this->curso->all();
        $turmas = $this->turma->all();
        $frequencia = $this->frequencia->sum('presente');
        $grafico      = $this->frequencia->select()
            ->whereBetween('data', array('2017-01-01', '2017-12-01'))
            ->get();

        return view('home', compact('alunos', 'cursos', 'turmas', 'frequencia', 'grafico'));
    }

    public function contato(Request $request)
    {
        return view('contato');
    }

    public function send()
    {
        return view('send');
    }

}
