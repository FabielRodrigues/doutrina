<?php

namespace Doutrina\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    //
    protected $fillable = ['users_id', 'endereco', 'complemento', 'cidade', 'estado', 'cep'];
}
