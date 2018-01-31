<?php

namespace C18app\CmsX\Models;

use C18app\CmsX\Models\Base as Model;

class Tag extends Model
{
    protected $fillable = [
        'title',
        'invisible'
    ];

    protected $attributes = [
        'invisible' => 0
    ];

    public function pages()
    {
        return $this->belongsToMany('C18app\CmsX\Models\Page', $this->table_prefix . 'page_tag');
    }
}
