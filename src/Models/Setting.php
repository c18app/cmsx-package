<?php

namespace C18app\CmsX\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use C18app\CmsX\Traits\Sort;

class Setting extends Model
{
    protected $table = 'cmsx_settings';

    protected $fillable = [
        'title',
        'content',
    ];
}
