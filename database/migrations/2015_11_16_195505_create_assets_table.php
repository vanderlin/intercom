<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('assets') == false) 
        {
            Schema::create('assets', function(Blueprint $table) {
                $table->increments('id');
                $table->string('filename');
                $table->string('uid');
                $table->string('path');
                $table->string('source');
                $table->string('filesystem_name');
                $table->integer('user_id');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('assets');
    }
}
