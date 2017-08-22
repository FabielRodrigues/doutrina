<?php

namespace Doutrina\Models;

use Illuminate\Database\Eloquent\Model;

class Crianca extends Model
{
    protected $fillable = ['users_id', 'alergia', 'restricao', 'emergencia', 'autorizacao', 'termo', 'direito'];


}
