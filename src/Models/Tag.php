<?php

namespace C18app\CmsX\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use C18app\CmsX\Traits\Sort;

class Tag extends Model
{
    protected $table = 'cmsx_tags';

    protected $fillable = [
        'title',
        'invisible'
    ];

    protected $attributes = [
        'invisible' => 0
    ];

    public function pages()
    {
        return $this->belongsToMany('C18app\CmsX\Models\Page', 'cmsx_page_tag');
    }
}
