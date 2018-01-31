<?php

namespace C18app\CmsX\Models;

use C18app\CmsX\Models\Base as Model;

class Setting extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];
}
