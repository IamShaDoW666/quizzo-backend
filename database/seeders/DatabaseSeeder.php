<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Quiz::factory(10)->create();
        Question::factory(50)->create()->each(function($q) {
            Option::factory(4)->create()->each(function($op) use ($q) {
                $op->question()->associate($q);
                $op->save();
            });
        });
        
    }
}
