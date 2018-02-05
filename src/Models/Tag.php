<?php

namespace C18app\Cmsx\Models;

use C18app\Cmsx\Models\Base as Model;

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
        return $this->morphedByMany('C18app\Cmsx\Models\Page', 'taggable', $this->table_prefix . 'taggables');
    }
}
