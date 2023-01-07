<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PregnantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,400) as $index){
            DB::table('pregnants')->insert([
                'mother_name' => $faker->name($gender = 'female') , 
                'age' => rand(16, 40),
                'numberofchildren' => rand(1, 7),
                'mensdate' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
                'prob_bdate' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
                'problem' => rand(1, 7),
                'children' => rand(1, 7),
                'created' =>  $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null) 
            ]);
        }
    }
}
