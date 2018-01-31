<?php

namespace C18app\Cmsx\Models;

use Illuminate\Database\Eloquent\Model;
use C18app\Cmsx\Traits\PrefixModelTableName;

class Base extends Model
{
    use PrefixModelTableName;
    protected $table_prefix = '';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table_prefix = \Config::get('cmsx.table_prefix');
    }
}
