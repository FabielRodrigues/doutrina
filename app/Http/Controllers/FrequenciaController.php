<?php

namespace Doutrina\Http\Controllers;

use Doutrina\Models\Frequencia;
use Doutrina\Models\Turma;
use Doutrina\Models\User;
use Doutrina\Models\UserTurma;
use Illuminate\Http\Request;

use Doutrina\Http\Requests;
use Illuminate\Support\Facades\Auth;

class FrequenciaController extends Controller
{
    //
    protected $turma;
    protected $user;
    protected $userTurma;
    protected $frequencia;

    public function __construct(Turma $turma, User $user, UserTurma $userTurma, Frequencia $frequencia)
    {
        $this->turma = $turma;
        $this->user = $user;
        $this->userTurma = $userTurma;
        $this->frequencia = $frequencia;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $listarTurmas = $this->turma->select()
            ->join('ciclos', 'ciclos.id', '=', 'turmas.ciclos_id')
            ->join('cursos', 'cursos.id', '=', 'ciclos.cursos_id')
            ->join('monitor_turmas', 'monitor_turmas.turma_id','=', 'turmas.id')
            ->select('turmas.*', 'ciclos.name as ciclo_name', 'cursos.name as curso_name')
            ->where('monitor_turmas.user_id', Auth::user()->id)
            ->get();

        return view('frequencia/index', compact('listarTurmas'));
    }

    public function chamada($id)
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

        return view('frequencia/chamada', compact('alunos', 'id'));
    }

    public function chamadaStore(Request $request)
    {

        $data = explode("/", $request->data);
        $newdata = $data[2] . "-" . $data[1] . "-" . $data[0];
        $contador = count($request->users_id);
        for ($i = 1; $i <= $contador; $i++) {

            if ($request->presente[$i] == 'presente') {

                $frequencia = $this->frequencia->create([
                    'presente'          => '1',
                    'data'              => $newdata,
                    'turma_id'          => $request->turma_id,
                    'users_id'          => $request->users_id[$i]
                ]);

                $frequencia->save();

            }

            if ($request->presente[$i] == 'falta') {

                $frequencia = $this->frequencia->create([
                    'falta'             => '1',
                    'data'              => $newdata,
                    'turma_id'          => $request->turma_id,
                    'users_id'          => $request->users_id[$i]
                ]);

                $frequencia->save();

            }

            if ($request->presente[$i] == 'falta_justificada') {

                $frequencia = $this->frequencia->create([
                    'falta_justificada' => '1',
                    'data'              => $newdata,
                    'turma_id'          => $request->turma_id,
                    'users_id'          => $request->users_id[$i]
                ]);

                $frequencia->save();
            }

        }

        return redirect('frequencia')->with('status', 'Chamada realizada com sucesso!');
    }

    public function listarChamadas($id)
    {
        $frequencia = $this->frequencia->select()
            ->where('turma_id', '=', $id)
            ->groupBy('data')
            ->orderBy('data', 'desc')
            ->get();

        return view('/frequencia/listarchamadas', compact('frequencia'));

    }

    public function editarChamada($data)
    {
        $frequencias = $this->frequencia->where('data', $data)->get();
        return view('frequencia/editarchamada', compact('frequencias'));
    }

    public function editar($id)
    {
        $frequencias = $this->frequencia->where('id', $id)->first();
        return view('frequencia/editar', compact('frequencias'));
    }

    public function update(Request $request, $id)
    {

        if ($request->presente == 'presente') {

            $this->frequencia->find($id)->update([
                'presente'          => '1',
                'falta'             => '',
                'falta_justificada' => '',
            ]);

        }

        if ($request->presente == 'falta') {

            $this->frequencia->find($id)->update([
                'presente'          => '',
                'falta'             => '1',
                'falta_justificada' => '',
            ]);

        }

        if ($request->presente == 'falta_justificada') {

            $this->frequencia->find($id)->update([
                'presente'          => '',
                'falta'             => '',
                'falta_justificada' => '1',
            ]);
        }
        return redirect("frequencia")->with('status', 'Chamada alterada com sucesso!');
    }

    public function destroy($id, $data)
    {
        $this->frequencia->where('turma_id', $id)->where('data', $data)->delete();
        return redirect()->back()->with('status', 'Chamada deletada com sucesso!');
    }


}
