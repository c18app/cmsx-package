<?php

namespace C18app\CmsX\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use C18app\CmsX\Traits\Sort;

class Page extends Model
{
    use SoftDeletes;
    use Sort;

    protected $table = 'cmsx_pages';

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
        return $this->belongsToMany('C18app\CmsX\Models\Tag', 'cmsx_page_tag');
    }
}
