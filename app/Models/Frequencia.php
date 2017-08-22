<?php

namespace Doutrina\Models;

use Illuminate\Database\Eloquent\Model;

class Frequencia extends Model
{
    //
    protected $fillable = ['users_id', 'turma_id', 'presente', 'falta', 'falta_justificada', 'data'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function turmas()
    {
        return $this->belongsTo(Turma::class);
    }
}
