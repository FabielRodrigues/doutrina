<?php

namespace Doutrina\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turma extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'ciclos_id', 'turma', 'ano', 'sala', 'vagas','horario','dia'
    ];

    protected $dates = ['deleted_at'];

    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class, 'ciclos_id');
    }

    public function alunos()
    {
        return $this->belongsToMany('Doutrina\Models\Users', 'user_turmas');
    }

    public function frequencias()
    {
        return $this->hasMany(Frequencia::class, 'turma_id');
    }
}
