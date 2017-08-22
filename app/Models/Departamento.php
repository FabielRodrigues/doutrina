<?php

namespace Doutrina\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'sigla'];

    protected $dates = ['deleted_at'];

    public function curso()
    {
        return $this->hasMany(Curso::class);
    }
}
