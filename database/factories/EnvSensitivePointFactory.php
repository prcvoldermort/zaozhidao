<?php

$factory->define(App\EnvSensitivePoint::class, function (Faker\Generator $faker) {

    return [
        'project_id' => $faker->randomDigitNotNull,
        'envSensitivePoint_lat' => $faker->randomFloat(null,0,100),
        'envSensitivePoint_long' => $faker->randomFloat(null,0,100),
        'envSensitivePoint_desc' => $faker->text,
        'envSensitivePoint_population' => $faker->randomDigitNotNull
    ];
});