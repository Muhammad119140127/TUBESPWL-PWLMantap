<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produk;
use Faker\Generator as Faker;

$factory->define(Produk::class, function (Faker $faker) {
    $randomNumber = rand(10, 20);
    $image = "https://picsum.photos/id/{$randomNumber}/200/300";
    return [
        'nama' => $faker->name,
        'model' => 'Official Clothes',
        'harga' => $faker->numberBetween(100000, 1000000),
        'quantity' => $faker->numberBetween(3, 40),
        'diskon' => $faker->numberBetween(0, 50),
        'files' => $image,

    ];
});
