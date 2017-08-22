<?php

namespace Doutrina\Models;

use Illuminate\Database\Eloquent\Model;

class Parente extends Model
{
    //
    protected $table = 'users_parents';

    protected $fillable = [
        'users_id', 'users_id2', 'parents'
    ];

    public $timestamps = false;
}
