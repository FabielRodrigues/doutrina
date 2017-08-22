<?php

namespace Doutrina\Http\Controllers;

use Doutrina\Models\Permission;
use Doutrina\Models\Role;
use Illuminate\Http\Request;

use Doutrina\Http\Requests;

class RolesController extends Controller
{
    private $roles;
    private $permissions;

    public function __construct(Role $roles, Permission $permissions)
    {
        $this->middleware('auth');
        $this->roles = $roles;
        $this->permission = $permissions;
    }

    public function index()
    {
        $this->authorize('Listar funções');
        $roles = $this->roles->paginate(10);
        return view('/roles/index', compact('roles'));
    }

    public function create()
    {
        $this->authorize('Cadastrar funções');
        return view('/roles/create');
    }

    public function store(Request $request)
    {
        $this->authorize('Cadastrar funções');
        $this->roles->create($request->all());
        return redirect('/roles')->with('status', 'Função cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $this->authorize('Editar funções');
        $roles = $this->roles->find($id);
        return view('/roles/edit', compact('roles'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('Editar funções');
        $this->roles->find($id)->update($request->all());
        return redirect('/roles')->with('status', 'Função editada com sucesso!');
    }

    public function destroy($id)
    {
        $this->authorize('Deletar funções');
        $this->roles->find($id)->delete();
        return redirect('/roles')->with('status', 'Função deletada com sucesso!');
    }

    public function permissions($id)
    {
        $this->authorize('Minhas Permissões');
        $roles = $this->roles->find($id);
        $permissions = $this->permission->orderBy('name', 'ASC')->get();
        return view('/roles/permissions', compact('roles', 'permissions'));
    }

    public function permissionstore(Request $request, $id)
    {
        $this->authorize('Cadastrar minhas permissões');
        $role = $this->roles->find($id);
        $permission = $this->permission->findOrFail($request->all()['permission_id']);
        $role->addPermission($permission);
        return redirect()->back()->with('status', 'Permissão adicionada com sucesso!');
    }

    public function permissionrevoke($id, $permission_id)
    {
        $this->authorize('Revogar minha permissão');
        $role = $this->roles->find($id);
        $permission = $this->permission->find($permission_id);
        $role->revokePermission($permission);
        return redirect()->back()->with('status', 'Permissão revogada com sucesso!');
    }

}
