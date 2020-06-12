<?php

use App\Models\Lession;
use Illuminate\Database\Seeder;

class LessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lession::class, 100)->create();
    }
}
