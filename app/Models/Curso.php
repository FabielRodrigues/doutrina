<?php

namespace Doutrina\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'status', 'departamentos_id'
    ];

    protected $dates = ['deleted_at'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamentos_id');
    }

    public function ciclo()
    {
        return $this->hasMany(Ciclo::class);
    }
}