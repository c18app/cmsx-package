<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use C18app\Cmsx\Migrations\Base as Migration;

class CreateCmsxRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_prefix . 'role_user', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id', false, true);
            $table->integer('role_id', false, true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table_prefix . 'role_user');
    }
}
