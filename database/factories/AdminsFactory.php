<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'name' => 'admin',
        'email' => 'admin@dcgroup.ph',
        'password' => bcrypt('12345678')
    ];
});
