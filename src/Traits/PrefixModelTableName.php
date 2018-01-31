<?php

namespace C18app\CmsX\Traits;

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