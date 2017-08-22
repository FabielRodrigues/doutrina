<?php

namespace Doutrina\Http\Controllers;

use Doutrina\Models\Permission;
use Doutrina\Models\Role;
use Illuminate\Http\Request;

use Doutrina\Http\Requests;

class PermissionController extends Controller
{
    private $permissions;

    public function __construct(Permission $permissions)
    {
        $this->middleware('auth');
        $this->permission = $permissions;
    }

    public function index()
    {
        $this->authorize('Listar permissões');
        $permission = $this->permission->all();
        return view('/permissions/index', compact('permission'));
    }

    public function create()
    {
        $this->authorize('Cadastrar permissões');
        return view('/permissions/create');
    }

    public function store(Request $request)
    {
        $this->authorize('Cadastrar permissões');
        $this->permission->create($request->all());
        return redirect('/permissions')->with('status', 'Permissão cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $this->authorize('Editar permissões');
        $permission = $this->permission->find($id);
        return view('/permissions/edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('Editar permissões');
        $this->permission->find($id)->update($request->all());
        return redirect('/permissions')->with('status', 'Permissão editada com sucesso!');
    }

    public function destroy($id)
    {
        $this->authorize('Deletar permissões');
        $this->permission->find($id)->delete();
        return redirect('/permissions')->with('status', 'Permissão deletada com sucesso!');
    }

}
