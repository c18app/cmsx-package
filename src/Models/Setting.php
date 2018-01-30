<?php

namespace Cms18\CmsX\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cms18\CmsX\Traits\Sort;

class Setting extends Model
{
    protected $table = 'cms18_settings';

    protected $fillable = [
        'title',
        'content',
    ];
}
