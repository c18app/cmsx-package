<?php

namespace C18app\Cmsx\Traits;

trait HasRoles
{
    public function roles()
    {
        return $this->belongsToMany('C18app\Cmsx\Models\Role');
    }
}