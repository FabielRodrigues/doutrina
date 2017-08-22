<?php

namespace Doutrina\Http\Controllers;

use Doutrina\Models\Ciclo;
use Doutrina\Models\Monitor_turma;
use Doutrina\Models\Roleuser;
use Doutrina\Models\Turma;
use Doutrina\Models\Role;
use Doutrina\Models\User;
use Illuminate\Http\Request;

use Doutrina\Http\Requests;
use Illuminate\Support\Facades\Auth;

class MonitorController extends Controller
{
    //
    private $user;
    private $roles;
    private $ciclo;
    private $turma;
    private $monitorTurma;
    private $roleuser;

    public function __construct(User $user, Roleuser $roleuser, Role $roles, Ciclo $ciclo, Turma $turma, Monitor_turma $monitorTurma)
    {
        $this->middleware('auth');
        $this->user  = $user;
        $this->roles = $roles;
        $this->roleuser = $roleuser;
        $this->ciclo = $ciclo;
        $this->turma = $turma;
        $this->monitorTurma = $monitorTurma;
    }

    public function index()
    {
        $monitores = $this->user->select()
                        ->join('role_user', 'users.id', '=', 'role_user.user_id')
                        ->join('roles', 'role_user.role_id', '=', 'roles.id')
                        ->select('users.*', 'role_user.*', 'roles.name as n')
                        ->whereNull('users.deleted_at')
                        ->where('roles.name', '=', 'Monitor')->get();

        return view('monitores/index', compact('monitores'));

    }

    public function create()
    {
        return view('monitores/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            '_token' => $request->remember_token
        ]);

        $user->save();

        $roles = $this->roleuser->create([
            'user_id' => $user->id,
            'role_id' => 2
        ]);

        $roles->save();

        return redirect('monitores')->with('status', 'Monitor cadastrado com sucesso!');
    }

    public function edit($id)
    {

        $this->authorize('Editar usuários');
        $users = $this->user->find($id);
        return view('monitores/edit')->with('users', $users);

    }

    public function update(Request $request, $id)
    {
        $this->authorize('Editar usuários');
        $this->user->find($id)->update($request->only([
            'name', 'email'
        ]));
        return redirect('monitores')->with('status', 'Monitor editado com sucesso!');
    }

    public function view($id)
    {

        $users = $this->user->find($id);

        return view('monitores/view', compact('users'));

    }

    public function vincular($id)
    {

        $turmas = $this->turma->select()
            ->join('ciclos', 'ciclos.id', '=', 'turmas.ciclos_id')
            ->join('cursos', 'cursos.id', '=', 'ciclos.cursos_id')
            ->select('turmas.*', 'ciclos.name as ciclo', 'cursos.name as curso')
            ->get();
        $listaTurmaMonitores = $this->monitorTurma->select()
            ->join('turmas', 'turmas.id', '=', 'monitor_turmas.turma_id')
            ->join('ciclos', 'ciclos.id', '=', 'turmas.ciclos_id')
            ->join('cursos', 'cursos.id', '=', 'ciclos.cursos_id')
            ->select('monitor_turmas.id as idmonitor','turmas.*', 'ciclos.name as ciclo', 'cursos.name as curso')
            ->where('user_id', $id)->get();
        return view('monitores/vincular', compact('turmas', 'id', 'listaTurmaMonitores'));
    }

    public function vincularStore(Request $request)
    {
        $monitorTurma = new Monitor_turma();
        $monitorTurma->user_id  = $request->user_id;
        $monitorTurma->turma_id = $request->turma_id;
        $monitorTurma->save();
        return redirect()->back()->with('status', 'Monitor vinculado a turma com sucesso!');
    }

    public function vincularRevoke($id)
    {
        $this->monitorTurma->find($id)->delete();
        return redirect()->back()->with('status', 'Monitor desvinculado da turma com sucesso!');
    }


}
