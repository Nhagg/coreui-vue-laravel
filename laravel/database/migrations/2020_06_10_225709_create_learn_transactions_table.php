<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnTransactionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learn_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('learn_item_id');
            $table->integer('learn_result');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('lipe_type');
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
        Schema::drop('learn_transactions');
    }
}
