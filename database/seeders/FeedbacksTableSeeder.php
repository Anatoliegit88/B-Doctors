<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as faker; 

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 15; $i++) {
            $feedback = new Feedback();
            $feedback->vote = $faker->numberBetween(1,5);
            $feedback->review = $faker->text();
            $feedback->reviewer_name = $faker->name();
            $feedback->user_id = $faker->numberBetween(61,75); 
            $feedback->save();
        }  
    }
}
