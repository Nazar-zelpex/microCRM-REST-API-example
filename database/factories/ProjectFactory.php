<?php

use Faker\Generator as Faker;

$factory->define(/**
 * @param Faker $faker
 *
 * @return array
 */
    App\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(),
        'status' => $faker->randomElement(['planned', 'running', 'on hold', 'finished', 'cancel']),
    ];
});
