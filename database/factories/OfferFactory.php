<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\JobBoard\Offer;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Offer::class, function (Faker $faker) {
    return [

        'code' => $faker->uuid,
        'contact' => $faker->freeEmail,
        'email' => $faker->email,
        'phone' => $faker->numberBetween($min = 1000000000, $max = 9999999999),
        'cell_phone' => $faker->numberBetween($min = 1000000000, $max = 9999999999),
        'contract_type' => $faker->bs,
        'position' => $faker->jobTitle,
        'training_hours' => $faker->numberBetween($min = 20, $max = 80),
        'remuneration' => $faker->numberBetween($min = 100, $max = 400),
        'working_day' => $faker->numberBetween($min = 1000000000, $max = 9999999999),
        'number_jobs' => $faker->numberBetween($min = 1000000000, $max = 9999999999),
        'experience_time' => '90 Horas',
        'activities' => $faker->text($maxNbChars = 200),
        'aditional_information' => $faker->text($maxNbChars = 200),
        'start_date' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
        'finish_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null),
        'company_id' => 1,
        'city_id' => $faker->numberBetween($min = 1, $max = 9),
        'province_id' => $faker->numberBetween($min = 1, $max = 9),
        'state_id' => 1,
        'father_category_id' => $faker->numberBetween($min = 1, $max = 9),
        'children_category_id' => $faker->numberBetween($min = 10, $max = 18),
    ];
});
