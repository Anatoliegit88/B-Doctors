<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as faker; 
class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $spec = ['Cardiologist', 'Immunologist', 'Dermatologist', 'Nephrologists', 'Gastroenterologist', 'Urologists', 'Infectious disease', 'Ophthalmologists', 'Gynecologists', 'Endocrinologists',];
        for ($i = 0; $i < count($spec); $i++) {
            $specialization = new Specialization();
            $specialization->title = $spec[$i];
            $specialization->slug = Str::slug($specialization->title, '-');
            $specialization->save(); 
        }
    }
}
