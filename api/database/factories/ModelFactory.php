<?php

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->safeEmail,
        'username' => $faker->userName,
        'email_verified_at' => $faker->dateTimeBetween(),
        'password' => \Hash::make('secret'),
        'lang' => 'ua',
        'thumbnail' => $faker->word,
        'remember_token' => str_random(10),
    ];
});

