<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use C18app\Cmsx\Migrations\Base as Migration;

class CreateCmsxTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table_prefix . 'tags', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('invisible')->default(0);
            $table->string('title', 255)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table_prefix . 'tags');
    }
}
