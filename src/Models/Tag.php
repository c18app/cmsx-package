<?php

namespace C18app\CmsX\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use C18app\CmsX\Traits\Sort;

class Tag extends Model
{
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
        return $this->belongsToMany('C18app\CmsX\Models\Page', 'cms18x_page_tag');
    }
}
