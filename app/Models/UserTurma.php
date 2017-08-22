<?php

namespace Doutrina\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTurma extends Model
{
    protected $table = 'user_turmas';

    protected $fillable = [
        'users_id', 'turmas_id'
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
