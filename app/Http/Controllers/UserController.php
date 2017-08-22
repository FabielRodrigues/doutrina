<?php

namespace Doutrina\Http\Controllers;

use Doutrina\Models\Role;
use Doutrina\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

use Doutrina\Http\Requests;
use Doutrina\Http\Requests\UsersRequest;


class UserController extends Controller
{
    private $users;
    private $roles;

    //
    public function __construct(User $users, Role $roles)
    {
        $this->middleware('auth');
        $this->users = $users;
        $this->roles = $roles;
    }

    public function index()
    {
        $this->authorize('Listar usuários');
        $users = $this->users->all();
        return view('users/index', ['users' => $users]);
    }

    public function create()
    {
        $this->authorize('Cadastrar usuários');
        return view('users/create');
    }

    public function store(UsersRequest $request)
    {
        $this->authorize('Cadastrar usuários');
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        $user = $this->users->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            '_token' => $request->remember_token
        ]);

        $user->save();

        return redirect('users')->with('status', 'Usuário cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $this->authorize('Editar usuários');
        $users = $this->users->find($id);
        return view('users/edit')->with('users', $users);
    }

    public function update($id, Request $request)
    {
        $this->authorize('Editar usuários');
        $this->users->find($id)->update($request->only([
            'name', 'email'
        ]));
        return redirect('users')->with('status', 'Usuário editado com sucesso!');
    }

    public function destroy($id)
    {
        $this->authorize('Deletar usuários');
        $this->users->find($id)->delete();
        return redirect('users')->with('status', 'Usuário deletado do sistema!');
    }

    public function roles($id)
    {
        $this->authorize('Listar as próprias funções');
        $user = $this->users->find($id);
        $roles = $this->roles->all();
        return view('users/roles', compact('roles', 'user'));
    }

    public function storeRole(Request $request, $id)
    {
        $this->authorize('Cadastrar funções');
        $user = $this->users->find($id);
        $role = $this->roles->findOrFail($request->all()['role_id']);
        $user->addRole($role);
        return redirect()->back()->with('status', 'Função adicionada com sucesso!');
    }

    public function revokeRole($id, $role_id)
    {
        $this->authorize('Revogar função');
        $user = $this->users->find($id);
        $role = $this->roles->find($role_id);
        $user->revokeRole($role);
        return redirect()->back()->with('status', 'Função revogada com sucesso!');
    }

    public function profile()
    {
        $users = $this->users->paginate(10);
        return view('users/index', array('user' => Auth::user(), 'users' => $users));
    }


    public function update_avatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('uploads/avatars/' . $filename));

            $users = User::find($request->user_id);
            $users->avatar = $filename;
            $users->save();


            return redirect()->back()->with('status', 'Foto atualizada com sucesso!');
        }
    }

    public function password($id)
    {
        activity()->log("Alterar senha");
        $users = $this->users->find($id);
        return view ('users.password')->with('users', $users);

    }

    public function updatepassword(Request $request, $id)
    {
        activity()->log("Alterou a senha no sistema.");
        $this->validate($request, [
            'password'  => 'required|confirmed|min:6',
        ]);

        // dd(bcrypt($request->password));

        $userupdate = $this->users->find($id);
        $userupdate->password = bcrypt($request->password);
        $userupdate->save();

        return redirect('users')->with('status', 'Senha alterada com sucesso!');

    }

}
