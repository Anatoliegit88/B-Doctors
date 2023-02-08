<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str; 

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i = 0; $i < 15;  $i++){
         $user = new User(); 
         $user->name = $faker->firstName(); 
         $user->surname = $faker->lastName(); 
         $user->slug = Str::slug($user->name . '-' . $user->surname . '-' . $user->id);  
         $user->email = $faker->email(); 
         $user->email_verified_at = $faker->dateTime(); 
         $user->password = $faker->password(10,10);
         $user->save(); 
        }

    }
}