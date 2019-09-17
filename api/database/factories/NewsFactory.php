<?php

$factory->define(App\Models\News::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->realText(75),
        'description' => $faker->text,
        'content' => $faker->paragraph(3),
        'thumbnail' => $faker->image(),
        'creator_id' => 1,
        'entity' => \App\Models\User::class,
        'lang' => 'en',
    ];
});

$factory->state(App\Models\News::class, 'article', function(Faker\Generator $faker) {
    return [
        'type' =>'article',
        'link' => $faker->uuid,
    ];
});

$factory->state(App\Models\News::class, 'advertising', function(Faker\Generator $faker) {
    return [
        'type' =>'advertising',
        'link' => $faker->uuid,
    ];
});

$factory->state(App\Models\News::class, 'message', function(Faker\Generator $faker) {
    return [
        'type' =>'message',
        'link' => $faker->uuid,
    ];
});