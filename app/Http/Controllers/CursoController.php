<?php

namespace Doutrina\Http\Controllers;

use Doutrina\Models\Ciclo;
use Doutrina\Models\Curso;
use Doutrina\Models\Departamento;
use Illuminate\Http\Request;

use Doutrina\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{
    //
    protected $curso;
    protected $departamento;

    public function __construct(Curso $curso, Departamento $departamento)
    {
        $this->middleware('auth');
        $this->curso = $curso;
        $this->departamento = $departamento;
    }

    public function index()
    {
        $listarCursos = $this->curso->all();
        return view('curso/index', compact('listarCursos'));
    }

    public function create()
    {
        $listarDepartamentos = $this->departamento->all();
        return view('curso/create', compact('listarDepartamentos'));
    }

    public function store(Request $request)
    {
        $this->curso->create($request->all());
        return redirect('curso')->with('status', 'Curso cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $listarDepartamentos = $this->departamento->all();
        $curso = $this->curso->find($id);
        return view('curso/edit', compact('curso', 'listarDepartamentos'));
    }

    public function update(Request $request, $id)
    {
        $this->curso->find($id)->update($request->all());
        return redirect('curso')->with('status', 'Curso atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Ciclo::where('cursos_id', '=', $id)->delete();
        $this->curso->find($id)->delete();
        return redirect('curso')->with('status', 'Curso deletado com sucesso!');
    }
}
