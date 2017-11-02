<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Device::class, function (Faker $faker) {
    return [
        'uuid' => $faker->unique()->uuid,
        'label' => $faker->firstName,
        'checked_in_at' => $faker
            ->dateTimeBetween(
                $startDate = '-2 days',
                $endDate = 'now',
                $timezone = date_default_timezone_get()
            ),
    ];
});
