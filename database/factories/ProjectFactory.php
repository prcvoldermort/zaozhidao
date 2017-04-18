<?php

$factory->define(App\Project::class, function (Faker\Generator $faker) {

    return [
        'project_name' => $faker->text,
        'project_title' => $faker->text,
        'project_foreword' => $faker->text,
        'project_overview' => $faker->text,
        'project_airInfluence' => $faker->text,
        'project_waterInfluence' => $faker->text,
        'project_solidWaste' => $faker->text,
        'project_environmentRisk' => $faker->text,
        'project_others' => $faker->text,
        'project_thoroughView' => $faker->text,
        'project_lat' => $faker->randomFloat(null,0,100),
        'project_long' => $faker->randomFloat(null,0,100)
    ];
});