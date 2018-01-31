<?php

namespace C18app\CmsX\Models;

use C18app\CmsX\Traits\PrefixModelTableName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use C18app\CmsX\Traits\Sort;

class Setting extends Model
{
    use PrefixModelTableName;

    protected $table = 'cms18x_settings';

    protected $fillable = [
        'title',
        'content',
    ];
}
