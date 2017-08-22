<?php

namespace Doutrina\Http\Controllers;

use Doutrina\Models\Ciclo;
use Doutrina\Models\Curso;
use Doutrina\Models\Departamento;
use Illuminate\Http\Request;

use Doutrina\Http\Requests;

class CicloController extends Controller
{
    //
    protected $ciclo;
    protected $curso;
    protected $departamentos;

    public function __construct(Ciclo $ciclo, Curso $curso, Departamento $departamentos)
    {
        $this->middleware('auth');
        $this->ciclo = $ciclo;
        $this->curso = $curso;
        $this->departamentos = $departamentos;
    }

    public function index()
    {
        $listarCiclos = $this->ciclo->select()
            ->join('cursos', 'cursos.id', '=', 'ciclos.cursos_id')
            ->select('cursos.name as nomecurso', 'ciclos.*')
            ->get();
        return view('ciclo/index', compact('listarCiclos'));
    }

    public function create()
    {
        $listadecursos = $this->curso->all();
        return view('ciclo/create', compact('listadecursos'));
    }

    public function store(Request $request)
    {
        $this->ciclo->create($request->all());
        return redirect('ciclo')->with('status', 'Ciclo cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $listadecursos = $this->curso->all();
        $ciclo = $this->ciclo->find($id);
        return view('ciclo/edit', compact('ciclo', 'listadecursos'));
    }

    public function update(Request $request, $id)
    {
        $this->ciclo->find($id)->update($request->all());
        return redirect('ciclo')->with('status', 'Ciclo atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $this->ciclo->find($id)->delete();
        return redirect('ciclo')->with('status', 'Ciclo deletado com sucesso!');
    }
}
