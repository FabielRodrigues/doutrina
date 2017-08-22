<?php

namespace Doutrina\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['users_id', 'ciclo_id', 'name'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class, 'ciclo_id');
    }
}
