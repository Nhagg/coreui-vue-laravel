<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LearnUnit;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/**
 * $table->increments('id');
 * $table->integer('lession_id');
 * $table->string('type');
 * $table->string('name_native_language');
 * $table->string('name_forgein_language');
 * $table->integer('learn_item_id');
 */


$factory->define(LearnUnit::class, function (Faker $faker) {
    return [
        'lession_id' => factory(App\Models\Lession::class)->create()->id,
        'learn_item_id' => factory(App\Models\LearnItem::class)->create()->id,
        'type' => LearnUnit::LEARN_UNIT_TYPE[random_int(0, 4)],
        'name_native_language' => $faker->name,
        'name_forgein_language' => $faker->name,
    ];
});
