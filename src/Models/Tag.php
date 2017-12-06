<?php

namespace Cms18\CmsX\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cms18\CmsX\Traits\Sort;

class Tag extends Model
{
    protected $table = 'cms18_tags';

    protected $fillable = [
        'title'
    ];

    public function pages() {
        return $this->belongsToMany('Cms18\CmsX\Models\Page', 'cms18_page_tag');
    }
}
