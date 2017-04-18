<?php

use Illuminate\Database\Seeder;

class EnvSensitivePointTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\EnvSensitivePoint::class,50)->create();
    }
}
