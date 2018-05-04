<?php

namespace Doutrina\Http\Controllers;

use Carbon\Carbon;
use Doutrina\Models\Adulto;
use Doutrina\Models\Ciclo;
use Doutrina\Models\Crianca;
use Doutrina\Models\Curso;
use Doutrina\Models\Departamento;
use Doutrina\Models\Endereco;
use Doutrina\Models\Role;
use Doutrina\Models\Turma;
use Doutrina\Models\User;
use Doutrina\Models\Roleuser;
use Doutrina\Models\UserTurma;
use Doutrina\Models\Parente;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Doutrina\Http\Requests\AlunoAdultoRequest;

use Doutrina\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AlunoController extends Controller
{
    //
    private $users;
    private $adultos;
    private $departamentos;
    private $cursos;
    private $ciclos;
    private $turmas;
    private $enderecos;
    protected $userTurma;
    protected $parente;
    protected $crianca;


    public function __construct(User $users, Roleuser $roles, Ciclo $ciclos, Turma $turmas, Departamento $departamentos, Curso $cursos, Adulto $adultos, Endereco $enderecos, UserTurma $userTurma, Parente $parente, Crianca $crianca)
    {
        $this->middleware('auth');
        $this->users = $users;
        $this->adultos = $adultos;
        $this->departamentos = $departamentos;
        $this->cursos = $cursos;
        $this->ciclos = $ciclos;
        $this->turmas = $turmas;
        $this->enderecos = $enderecos;
        $this->roles = $roles;
        $this->userTurma = $userTurma;
        $this->parente = $parente;
        $this->criancas = $crianca;
    }

    public function index()
    {
        $alunos = $this->users->select()
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('users.*', 'role_user.*', 'roles.name as n')
            ->whereNull('users.deleted_at')
            ->where('roles.name', '=', 'Aluno')->paginate(1000);

        return view('aluno/index', compact('alunos'));
    }

    public function createAdulto()
    {
        return view('aluno/createadulto');
    }

    public function storeAdulto(AlunoAdultoRequest $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
        ]);

        $al = User::where('name', $request->name)->first();

        if (isset($al->name) == $request->name){
            return redirect('/aluno')->with('status', 'Já existe um aluno com este nome, por favor pesquise na lista de alunos.');
        }

        $user = $this->users->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->email),
            '_token' => $request->remember_token
        ]);
        try {
            $user->save();

            $adultos = $this->adultos->create([
                'users_id' => $user->id,
            ]);

            $adultos->save();

            $criancas = $this->criancas->create([
                'users_id' => $user->id,
            ]);

            $criancas->save();

            $enderecos = $this->enderecos->create([
                'users_id' => $user->id,
            ]);

            $enderecos->save();

            $roles = $this->roles->create([
                'user_id' => $user->id,
                'role_id' => 3
            ]);

            $roles->save();

            return redirect("/aluno/cursos/$user->id")->with('status', 'Aluno cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect("aluno")->with('status', 'O aluno não pode ser cadastrado, tente novamente!');
        }


    }

    public function createCrianca()
    {
        return view('aluno/createcrianca');
    }

    public function storeCrianca(Request $request)
    {
        $email = strtolower(str_replace(' ', '', $request->name));
        $al = User::where('name', $request->name)->first();
        if (isset($al->name) == $request->name){
            return redirect('/aluno')->with('status', 'Já existe um aluno com este nome, por favor pesquise na lista de alunos.');
        }

        $user = $this->users->create([
            'name' => $request->name,
            'email' => $email . "@gaeeb.org.br",
            'password' => bcrypt($email),
            '_token' => $request->remember_token
        ]);
        try {
            $user->save();

            $criancas = $this->criancas->create([
                'users_id' => $user->id,
            ]);

            $criancas->save();

            $adultos = $this->adultos->create([
                'users_id' => $user->id,
            ]);

            $adultos->save();

            $enderecos = $this->enderecos->create([
                'users_id' => $user->id,
            ]);

            $enderecos->save();

            $roles = $this->roles->create([
                'user_id' => $user->id,
                'role_id' => 3
            ]);

            $roles->save();

            return redirect("/aluno/cursos/$user->id")->with('status', 'Aluno cadastrado com sucesso!');

        } catch (Exception $e) {
            return redirect("aluno")->with('status', 'O aluno não pode ser cadastrado, tente novamente!');
        }
    }

    public function edit($id)
    {
        $this->authorize('Editar aluno');
        $alunos = $this->users->find($id);
        return view('aluno/edit', compact('alunos'));
    }

    public function update(Request $request, $id)
    {
        $this->users->find($id)->update($request->only([
            'name', 'email'
        ]));
        return redirect("/aluno/profile/$id")->with('status', 'Aluno editado com sucesso!');
    }

    public function editContato($id)
    {
        $this->authorize('Editar contato aluno');
        $adultos = $this->adultos->where('users_id', $id)->first();
        return view('aluno/editcontato', compact('adultos', 'id'));
    }

    public function updateContato(Request $request, $id)
    {
        //dd($request->nascimento);
        $this->adultos->find($id)->update($request->only([
            'users_id' => $request->users_id,
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'celular' => $request->celular,
            'sexo' => $request->sexo,
            'formacao' => $request->formacao,
            'nascimento' => $request->nascimento,
            'profissao' => $request->profissao,
            'habilidade' => $request->habilidade
        ]));

        return redirect("/aluno/profile/$request->users_id")->with('status', 'Contato atualizado com sucesso!');
    }

    public function editEndereco($id)
    {
        $this->authorize('Editar endereço aluno');
        $enderecos = $this->enderecos->where('users_id', $id)->first();
        return view('aluno/editendereco', compact('enderecos', 'id'));
    }

    public function updateEndereco(Request $request, $id)
    {
        $this->enderecos->find($id)->update($request->all());
        return redirect("/aluno/profile/$request->users_id")->with('status', 'Endereço atualizado com sucesso!');
    }

    public function editCrianca($id)
    {
        $this->authorize('Editar crianca aluno');
        $criancas = $this->criancas->where('users_id', $id)->first();
        return view('aluno/editcrianca', compact('criancas', 'id'));
    }

    public function updateCrianca(Request $request, $id)
    {
        $this->criancas->find($id)->update($request->all());
        return redirect("/aluno/profile/$request->users_id")->with('status', 'Informaçoẽs da criança atualizados com sucesso!');
    }

    public function cursos($id)
    {
        $this->authorize('cursos aluno');
        $aluno = $this->users->find($id);
        $cursos = $this->users->select()
            ->join('user_turmas', 'user_turmas.users_id', '=', 'users.id')
            ->join('turmas', 'turmas.id', '=', 'user_turmas.turmas_id')
            ->join('ciclos', 'ciclos.id', '=', 'turmas.ciclos_id')
            ->join('cursos', 'cursos.id', '=', 'ciclos.cursos_id')
            ->select('users.*', 'user_turmas.*', 'ciclos.name as name_ciclo', 'turmas.*', 'cursos.name as name_curso')
            ->whereNull('turmas.deleted_at')
            ->where('users.id', '=', $id)->get();

        $listarciclos = $this->ciclos->select()
            ->join('cursos', 'cursos.id','=', 'ciclos.cursos_id')
            ->join('turmas', 'turmas.ciclos_id','=', 'ciclos.id')
            ->select('ciclos.name as ciclo', 'ciclos.id', 'cursos.name as curso','turmas.id as turma_id', 'turmas.turma')
            ->whereNull('turmas.deleted_at')
            ->get();

        return view('aluno/cursos', compact('id', 'listarciclos', 'cursos', 'aluno'));
    }

    public function storecursos(Request $request, $id)
    {
        $users = $this->users->find($id);
        try {
            $users->turma()->attach($request->turmas_id);
            return redirect("/aluno/profile/$id")->with('status', 'Curso vinculado com sucesso!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('aluno')->with('status', 'O aluno já está matriculado neste curso');
        }

    }

    public function revokecursos(Request $request, $id)
    {
        $users = $this->users->find($id);
        $users->turma()->detach($request->turmas_id);
        return redirect('aluno')->with('status', 'Curso desvinculado com sucesso!');
    }

    public function parentes($id)
    {
        $alunos = $this->users->select()
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('users.*', 'role_user.*', 'roles.name as n')
            ->where('roles.name', '=', 'Aluno')->get();

        return view('aluno/parentes', compact('alunos', 'id'));
    }

    public function storeparentes(Request $request)
    {
        $busca = $this->parente->select()
            ->where('users_id', '=', $request->users_id)
            ->where('users_id2', '=', $request->users_id2)
            ->first();
        if ($busca == "") {

            $parentes = $this->parente->create([
                'users_id' => $request->users_id,
                'users_id2' => $request->users_id2,
                'parents' => $request->parents
            ]);


            $parentes->save();

            return redirect("/aluno/profile/$request->users_id")->with('status', 'Aluno vinculado ao parente com sucesso.');

        } else {

            return redirect("/aluno/profile/$request->users_id")->with('status', 'Aluno já está vinculado a esta pessoa');
        }
    }

    public function profile($id)
    {
        $this->authorize('Visualizar aluno');
        $users     = $this->users->find($id);
        $adultos   = $this->adultos->where('users_id', '=', $id)->get();
        $enderecos = $this->enderecos->where('users_id', '=', $id)->get();
        $criancas  = $this->criancas->where('users_id', '=', $id)->get();
        $cursos    = $this->users->select()
            ->join('user_turmas', 'user_turmas.users_id', '=', 'users.id')
            ->join('turmas', 'turmas.id', '=', 'user_turmas.turmas_id')
            ->join('ciclos', 'ciclos.id', '=', 'turmas.ciclos_id')
            ->join('cursos', 'cursos.id', '=', 'ciclos.cursos_id')
            ->select('users.name', 'users.avatar', 'user_turmas.*', 'ciclos.name as name_ciclo', 'turmas.*',
                     'cursos.name as name_curso')
            ->where('users.id', '=', $id)
            ->get();

        $parentes = $this->parente->select()
                                  ->join('users', 'users.id', '=', 'users_parents.users_id2')
                                  ->join('enderecos', 'enderecos.users_id', '=', 'users_parents.users_id2')
                                  ->join('adultos', 'adultos.users_id', '=', 'users_parents.users_id2')
                                  ->join('criancas', 'criancas.users_id', '=', 'users_parents.users_id2')
                                  ->select('users.*', 'users_parents.*', 'enderecos.*', 'adultos.*', 'criancas.*')
                                  ->where('users_parents.users_id', $id)->get();

        return view('aluno/profile', compact('users', 'adultos', 'enderecos', 'cursos', 'criancas', 'parentes'));
    }

    public function destroy($id)
    {
        $this->authorize('Excluir aluno');
        $this->users->find($id)->delete();
        return redirect('aluno')->with('status', 'Aluno deletado do sistema!');
    }

    public function desvincularparent($id)
    {
        $this->parente->where('users_id2','=', $id)->delete();
        return redirect()->back()->with('status', 'Parente desvinculado com sucesso!');
    }

    public function ajaxcurso($departamentos_id)
    {
        $cursos = $this->cursos->select()->where('departamentos_id', $departamentos_id)->get();
        return response()->json($cursos);
    }

    public function ajaxciclo($cursos_id)
    {
        $ciclos = $this->ciclos->select()->where('cursos_id', $cursos_id)->get();
        return response()->json($ciclos);
    }

    public function ajaxturma($ciclos_id)
    {
        $turmas = $this->turmas->select()->where('ciclos_id', $ciclos_id)->get();
        return response()->json($turmas);
    }
}
