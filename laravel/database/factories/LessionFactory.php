<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lession;
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
 * $table->integer('course_id');
 * $table->string('name_native_language');
 * $table->string('name_second_language');
 */

$factory->define(Lession::class, function (Faker $faker) {
    $image = [
        'https://www.wallpaperup.com/uploads/wallpapers/2016/03/29/918802/bdab201cf97ede07f0bf35e1f545012b.jpg',
        'https://image.freepik.com/free-photo/image-human-brain_99433-298.jpg',
        'https://interactive-examples.mdn.mozilla.net/media/examples/grapefruit-slice-332-332.jpg',
        'https://s.ftcdn.net/v2013/pics/all/curated/RKyaEDwp8J7JKeZWQPuOVWvkUjGQfpCx_cover_580.jpg?r=1a0fc22192d0c808b8bb2b9bcfbf4a45b1793687',
        'https://helpx.adobe.com/content/dam/help/en/stock/how-to/visual-reverse-image-search/jcr_content/main-pars/image/visual-reverse-image-search-v2_intro.jpg'
    ];
    return [
        'course_id' => factory(App\Models\Course::class)->create()->id,
        'name_native_language' => $faker->name,
        'name_second_language' => $faker->name,
        'image' => $image[random_int(0, 4)],
        'type' => Lession::LESION_TYPE[random_int(0, count(Lession::LESION_TYPE) - 1)]
    ];
});
