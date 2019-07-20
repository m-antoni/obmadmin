<?php
/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'p_name' => 'Mini Bluetooth',
        'p_model' => 'B-118-78',
        'p_category' => 'TV Multimedia',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit Nostru quod consequuntur earum voluptatibus Ipsum eveniet asperiores debitis ipsam accusantium incidunt possimus autem delectus placeat quo laboriosam mollitia facere iste Dolores.',
        'price' => 2199,
        'quantity' => 12,
        'image' => '3',
    ];
    
});
