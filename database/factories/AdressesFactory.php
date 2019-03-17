<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Adresses::class, function (Faker $faker) {
    return [
        'street'        =>  $faker->streetName,
        'number'        =>  $faker->buildingNumber,
        'complement'    =>  $faker->words(2,true),
        'postal_code'   =>  $faker->postcode,
        'neighborhood'  =>  $faker->cityPrefix,
        'city'          =>  $faker->city,
        'state'         =>  $faker->state,
    ];
});
