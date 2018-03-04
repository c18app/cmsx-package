<?php

namespace C18app\Cmsx\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
