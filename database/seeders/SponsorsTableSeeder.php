<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as faker;
use Illuminate\Support\Str; 
class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)

    {
        for ($i = 0; $i < 3; $i++) 
        {
            $sponsor = new Sponsor();
            $sponsor->title = $faker->sentence(1);
            $sponsor->slug = Str::slug($sponsor->title, '-');
            $sponsor->price = $faker->randomFloat(2,1,8);
            $sponsor->description = $faker->text();
            $sponsor->save();
        }
    }
}
