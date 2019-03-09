<?php

use Faker\Generator as Faker;

$factory->define(App\Models\People\Person::class, function (Faker $faker) {
    return [
        'name'              =>  $faker->firstName,
         'fantasy_name'      =>  $faker->words(2,true),
        'social_reason'     =>  $faker->words(2,true),
        'cpf'               =>  $faker->numberBetween(00000000000,99999999999),
        'cnpj'              =>  $faker->numberBetween(00000000000000,99999999999999),
        'email'             =>  $faker->email,
        'phone1'            =>  $faker->numberBetween(000000000000,999999999999),
        'phone2'            =>  $faker->numberBetween(000000000000,999999999999),
        'male_female'       =>  $faker->randomElement(['f','m']),
        'active'            =>  $faker->boolean,
        'register_date'     =>  $faker->date(),
        'register_birthday' =>  $faker->date(),
    ];
});
