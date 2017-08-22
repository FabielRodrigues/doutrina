<?php

namespace Doutrina\Http\Controllers;

use Doutrina\Models\Adulto;
use Doutrina\Models\Crianca;
use Doutrina\Models\Endereco;
use Doutrina\Models\Parente;
use Doutrina\Models\User;
use Doutrina\Models\UserTurma;
use Illuminate\Http\Request;

use Doutrina\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    //
    protected $user;
    private $adultos;
    private $enderecos;
    protected $userTurma;
    protected $parente;
    protected $crianca;

    public function __construct(
        User $user, Adulto $adultos, Endereco $enderecos, UserTurma $userTurma,Parente $parente, Crianca $crianca
    )
    {
        $this->user    = $user;
        $this->adultos = $adultos;
        $this->enderecos = $enderecos;
        $this->userTurma = $userTurma;
        $this->parente = $parente;
        $this->criancas = $crianca;
    }

    public function index()
    {
        $user = $this->user->find(Auth::user()->id);

        $adultos = $this->adultos->where('users_id', '=', Auth::user()->id)->get();

        $enderecos = $this->enderecos->where('users_id', '=', Auth::user()->id)->get();
        $criancas = $this->criancas->where('users_id', '=', Auth::user()->id)->get();
        $cursos = $this->user->select()
            ->join('user_turmas', 'user_turmas.users_id', '=', 'users.id')
            ->join('turmas', 'turmas.id', '=', 'user_turmas.turmas_id')
            ->join('ciclos', 'ciclos.id', '=', 'turmas.ciclos_id')
            ->join('cursos', 'cursos.id', '=', 'ciclos.cursos_id')
            ->select('users.name', 'users.avatar', 'user_turmas.*', 'ciclos.name as name_ciclo', 'turmas.*',
                'cursos.name as name_curso')
            ->where('users.id', '=', Auth::user()->id)
            ->get();


        $parentes = $this->parente->select()
            ->join('users', 'users.id', '=', 'users_parents.users_id2')
            ->join('enderecos', 'enderecos.users_id', '=', 'users_parents.users_id2')
            ->join('adultos', 'adultos.users_id', '=', 'users_parents.users_id2')
            ->join('criancas', 'criancas.users_id', '=', 'users_parents.users_id2')
            ->select('users.*', 'users_parents.*', 'enderecos.*', 'adultos.*', 'criancas.*')
            ->groupBy('users_parents.users_id2')
            ->where('users_parents.users_id', Auth::user()->id)->get();

        return view('perfil.index', compact('user', 'adultos', 'enderecos', 'cursos', 'criancas', 'parentes'));

    }

    public function editarsobre()
    {
        $id = Auth::user()->id;
        $adultos = $this->adultos->where('users_id', Auth::user()->id)->first();
        if(isset($adultos->id)) {
            return view('perfil.editarsobre', compact('adultos','id'));
        } else {
            $this->adultos->create([
                'users_id' => Auth::user()->id,
            ]);
            $adultos = $this->adultos->where('users_id', Auth::user()->id)->first();
            return view('perfil.editarsobre', compact('adultos', 'id'));
        }
    }

    public function editaremail()
    {
        $id = Auth::user()->id;
        $alunos = $this->user->find(Auth::user()->id);
        return view('perfil.editaremail', compact('alunos','id'));

    }

    public function updateemail(Request $request)
    {

        $this->user->find(Auth::user()->id)->update($request->only([
            'name', 'email'
        ]));
        return redirect('/perfil')->with('status', 'Aluno editado com sucesso!');
    }

    public function updatesobre(Request $request)
    {
        $this->adultos->where('id', $request->id)->update([
            'cpf' => $request->cpf,
            'telefone' => $request->telefone,
            'celular' => $request->celular,
            'sexo' => $request->sexo,
            'formacao' => $request->formacao,
            'nascimento' => $request->nascimento,
            'profissao' => $request->profissao,
            'habilidade' => $request->habilidade
        ]);

        return redirect('/perfil')->with('status', 'Informações pessoais editado com sucesso!');

    }

    public function editarendereco()
    {
        $id = Auth::user()->id;
        $enderecos = $this->enderecos->where('users_id', Auth::user()->id)->first();
        if(isset($enderecos->id)) {

            return view('perfil.editarendereco', compact('enderecos','id'));
        } else {
            $this->enderecos->create([
                'users_id' => Auth::user()->id,
            ]);
            $enderecos = $this->enderecos->where('users_id', Auth::user()->id)->first();
            return view('perfil.editarendereco', compact('enderecos','id'));
        }
    }

    public function updateendereco(Request $request)
    {
        $this->enderecos->find($request->id)->update($request->all());
        return redirect('/perfil')->with('status', 'Informações pessoais editado com sucesso!');
    }

    public function alterarsenha()
    {
        $users = $this->user->find(Auth::user()->id);
        return view ('perfil.alterarsenha')->with('users', $users);
    }

    public function senhaupdate(Request $request)
    {
        $this->validate($request, [
            'password'  => 'required|confirmed|min:6',
        ]);

        // dd(bcrypt($request->password));

        $userupdate = $this->user->find(Auth::user()->id);
        $userupdate->password = bcrypt($request->password);
        $userupdate->save();

        return redirect('/perfil')->with('status', 'Senha alterada com sucesso!');
    }



}
