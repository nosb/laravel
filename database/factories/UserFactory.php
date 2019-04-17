<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Posts::class, function (Faker $faker) {
    $ids =  \App\User::pluck('id')->all();
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'uid' => $faker->randomElement($ids),
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    $ids =  \App\User::pluck('id')->all();
    $idss =  \App\Posts::pluck('id')->all();
    return [
        'title' => $faker->sentence,
        'uid' => $faker->randomElement($ids),
        'posts_id' => $faker->randomElement($idss),
    ];
});
