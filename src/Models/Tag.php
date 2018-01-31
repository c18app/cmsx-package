<?php

namespace C18app\CmsX\Models;

use C18app\CmsX\Traits\PrefixModelTableName;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use C18app\CmsX\Traits\Sort;

class Tag extends Model
{
    use PrefixModelTableName;

    protected $table = 'cms18x_tags';

    protected $fillable = [
        'title',
        'invisible'
    ];

    protected $attributes = [
        'invisible' => 0
    ];

    public function pages()
    {
        return $this->belongsToMany('C18app\CmsX\Models\Page', \Config::get('cmsx.table_prefix') . 'page_tag');
    }
}
