<?php

namespace Doutrina\Models;

use Illuminate\Database\Eloquent\Model;

class Monitor_turma extends Model
{
    //
    //
    protected $fillable = ['user_id', 'turma_id'];

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
}
