<?php

namespace C18app\Cmsx\Traits;

use Illuminate\Support\Str;

trait PrefixModelTableName
{
    public function getTable()
    {
        if (!isset($this->table)) {
            return \Config::get('cmsx.table_prefix') . str_replace('\\', '', Str::snake(Str::plural(class_basename($this))));
        }

        return $this->table;
    }
}