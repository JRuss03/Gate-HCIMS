<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BabySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,150) as $index){
            DB::table('babies')->insert([
                'name' => $faker->name, 
                'age' => rand(1, 3),
                'birthday' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
                'mother_name' => $faker->name($gender = 'female'),
                'father_name' => $faker->name($gender = 'male'),
                'guardian' => $faker->name,
                'guardian_contact_no' => rand(911111111, 999999999),
                'purok' => rand(1, 7),
                'created' =>  $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null) 
            ]);
        }
    }
}
