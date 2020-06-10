<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnUnitsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learn_units', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('lession_id');
            $table->increments('type');
            $table->increments('name_native_language');
            $table->increments('name_forgein_language');
            $table->increments('learn_item_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('learn_units');
    }
}
