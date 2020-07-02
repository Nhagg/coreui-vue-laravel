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
            $table->integer('lession_id');
            $table->string('type');
            $table->string('name_native_language');
            $table->string('name_forgein_language');
            $table->integer('learn_item_id');
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
