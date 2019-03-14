<?php

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'username' => $faker->userName,
        'email_verified_at' => $faker->dateTimeBetween(),
        'password' => \Hash::make('secret'),
        'remember_token' => str_random(10),
        'deleted_at' => rand(0,1)? $faker->dateTimeBetween() : null,
    ];
});

