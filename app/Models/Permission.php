<?php

namespace Doutrina\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $table = "permissions";
    
    protected $fillable = [
        'name','description'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
