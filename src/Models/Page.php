<?php

namespace Cms18\CmsX\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cms18\CmsX\Traits\Sort;

class Page extends Model
{
    use SoftDeletes;
    use Sort;

    protected $table = 'cms18_pages';

    protected $fillable = [
        'title',
        'content',
    ];

    protected $attributes = [
        'order' => 0
    ];

    public function getUrl()
    {
        return route('cms.page', ['id' => $this->id, 'slug' => str_slug($this->title)]);
    }

    public function tags() {
        return $this->belongsToMany('Cms18\CmsX\Models\Tag', 'cms18_page_tag');
    }
}
