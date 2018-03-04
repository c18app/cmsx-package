<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use C18app\Cmsx\Migrations\Base as Migration;

class CreateCmsxRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_prefix . 'roles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table_prefix . 'roles');
    }
}
