<?php

namespace Doutrina\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'nivel', 'password',
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function adulto()
    {
        return $this->hasOne(Adulto::class);
    }

    public function frequencias()
    {
        return $this->hasMany(Frequencia::class, 'users_id');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'users_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function addRole($role)
    {
        if(is_string($role)) {
            return $this->roles()->save(
                Role::whereName($role)->firstOrFail()
            );
        }

        return $this->roles()->save(
            Role::whereName($role->name)->firstOrFail()
        );
    }

    public function revokeRole(Role $role)
    {
        if (is_string($role)) {
            return $this->roles()->detach(
                Role::whereName($role)->firstOrFail()
            );
        }
        return $this->roles()->detach($role);
    }

    public function hasRole($role)
    {
        if (is_string($role)){
            return $this->roles->contains('name', $role);
        }

        if(is_array($role)){
            foreach ($role as $r) :
                if($this->roles->contains('name', $r)){
                    return true;
                }
            endforeach;

            return false;
        }

        return $role->intersect($this->roles)->count();
    }

    public function isAdmin()
    {
        return $this->hasRole('Administrador');
    }

    public function turma()
    {
        return $this->belongsToMany('Doutrina\Models\Turma', 'user_turmas', 'users_id', 'turmas_id', 'created_at', 'updated_at');
    }

    public function parentes()
    {
        return $this->belongsToMany('Doutrina\Models\User', 'users_parents', 'PIVOT', 'users_id', 'users_id2', 'parents')->withTimestamps();
    }

    public function verificarNome($nome)
    {

    }

    public function listarMonitores($id)
    {
        $listarTurmas = DB::table('turmas')->select()
            ->join('ciclos', 'ciclos.id', '=', 'turmas.ciclos_id')
            ->join('cursos', 'cursos.id', '=', 'ciclos.cursos_id')
            ->join('departamentos', 'departamentos.id', '=', 'cursos.departamentos_id')
            ->join('monitor_turmas', 'monitor_turmas.turma_id','=', 'turmas.id')
            ->select('turmas.*', 'ciclos.name as ciclo_name', 'cursos.name as curso_name', 'departamentos.sigla')
            ->where('monitor_turmas.user_id',$id)
            ->get();

        return $listarTurmas;
    }


    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
