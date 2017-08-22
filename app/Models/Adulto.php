<?php

namespace Doutrina\Models;

use Illuminate\Database\Eloquent\Model;

class Adulto extends Model
{
    //
    protected $fillable = ['users_id', 'cpf', 'telefone', 'celular', 'sexo', 'nascimento', 'formacao', 'profissao', 'habilidade'];

    public function userAdulto(){

        return $this->belongsTo(User::class, 'id');

    }
}
