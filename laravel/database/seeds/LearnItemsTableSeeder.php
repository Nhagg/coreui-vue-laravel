<?php

use Illuminate\Database\Seeder;

class LearnItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\LearnItem::class, 100)->create();
    }
}
