<?php

use Illuminate\Database\Seeder;
//use database\seeds\NotesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Course::truncate();
        \App\Models\LearnItem::truncate();
        \App\Models\Lession::truncate();
        \App\Models\LearnUnit::truncate();
        $this->call([
            CoursesTableSeeder::class,
            LearnItemsTableSeeder::class,
            LessionsTableSeeder::class,
            LearnUnitsTableSeeder::class,
        ]);

//        $this->call(MenusTableSeeder::class);
//        $this->call(UsersAndNotesSeeder::class);
//        $this->call('UsersAndNotesSeeder');
//        $this->call('MenusTableSeeder');
//        $this->call('FolderTableSeeder');
//        $this->call('ExampleSeeder');
//        $this->call('BREADSeeder');
//        $this->call('EmailSeeder');
    }
}
