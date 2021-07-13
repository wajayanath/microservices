<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Order::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'Last_name' => $faker->lastName,
        'email' => $faker->email,
    ];
});
