<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeniorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,100) as $index){
            DB::table('seniors')->insert([
                'name' => $faker->name, 
                'age' => rand(1, 3),
                'birthday' => $faker->dateTimeBetween($startDate = '-99 years', $endDate = '-65 years', $timezone = null),
                'guardian' => $faker->name,
                'guardian_contact_no' => rand(911111111, 999999999),
                'purok' => rand(1, 7),
                'created' =>  $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null) 
            ]);
        }
    }
}
