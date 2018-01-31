<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use C18app\CmsX\Migrations\Base as Migration;

class CreateCmsxPageTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create($this->table_prefix . 'page_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('page_id')->references('id')->on($this->table_prefix . 'pages');
            $table->foreign('tag_id')->references('id')->on($this->table_prefix . 'tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table_prefix . 'page_tag');
    }
}
