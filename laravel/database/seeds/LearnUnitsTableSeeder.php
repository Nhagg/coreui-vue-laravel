<?php

use Illuminate\Database\Seeder;

class LearnUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\LearnUnit::class, 100)->create();
    }
}
