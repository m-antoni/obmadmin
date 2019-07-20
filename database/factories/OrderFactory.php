<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'reference' => $faker->ean8,
        'user_id' => 3,
        'product_id' => 1,
        'quantity' => 3,
        'price' => 3000,
        'status' => 'pending',
        'payment' => $faker->randomElement(array('cod', 'bank')),
        'date' => now(),
    ];
});
