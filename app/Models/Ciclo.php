<?php

namespace Doutrina\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciclo extends Model
{
    use SoftDeletes;

    protected $table = 'ciclos';

    protected $fillable = [
        'name', 'cursos_id'
    ];

    protected $dates = ['deleted_at'];

    public function curso()
    {
        return $this->belongsTo(Curso::class,'cursos_id');
    }

    public function turma()
    {
        return $this->hasMany(Turma::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
