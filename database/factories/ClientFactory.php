<?php

use Faker\Generator as Faker;

$factory->define(/**
 * @param Faker $faker
 *
 * @return array
 */
    App\Client::class, function (Faker $faker) {

    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'), // secret
    ];
});
