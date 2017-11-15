<?php

use Faker\Generator as Faker;

$factory->define(App\profile::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->email,
        'address' => $faker->address
    ];
});
