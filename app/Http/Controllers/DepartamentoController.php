<?php

namespace Doutrina\Http\Controllers;

use Doutrina\Models\Departamento;
use Illuminate\Http\Request;

use Doutrina\Http\Requests;

class DepartamentoController extends Controller
{
    //
    protected $departamento;

    public function __construct(Departamento $departamento)
    {
        $this->middleware('auth');
        $this->departamento = $departamento;
    }

    public function index()
    {
        $listarDepartamentos = $this->departamento->all();
        return view('departamento/index', compact('listarDepartamentos'));
    }

    public function create()
    {
        return view('departamento/create');
    }

    public function store(Request $request)
    {
        $this->departamento->create($request->all());
        return redirect('departamento')->with('status', 'Departamento cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $departamento = $this->departamento->find($id);
        return view('departamento/edit', compact('departamento'));
    }

    public function update(Request $request, $id)
    {
        $this->departamento->find($id)->update($request->all());
        return redirect('departamento')->with('status', 'Departamento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $this->departamento->find($id)->delete();
        return redirect('departamento')->with('status', 'Departamento deletado com sucesso!');
    }
}
