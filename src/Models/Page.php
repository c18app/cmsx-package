<?php

namespace C18app\Cmsx\Models;

use C18app\Cmsx\Models\Base as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use C18app\Cmsx\Traits\Sort;

class Page extends Model
{
    use SoftDeletes;
    use Sort;

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

    public function tags()
    {
        return $this->morphToMany('C18app\Cmsx\Models\Tag', 'taggable', $this->table_prefix . 'taggables');
    }
}
