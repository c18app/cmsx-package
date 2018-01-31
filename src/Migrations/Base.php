<?php

namespace C18app\CmsX\Migrations;

use Illuminate\Database\Migrations\Migration;

class Base extends Migration
{
    protected $table_prefix = '';

    public function __construct()
    {
        $this->table_prefix = \Config::get('cmsx.table_prefix');
    }
}
