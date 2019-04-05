<?php

use App\User;
use Illuminate\Support\Str;
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


$factory->defineAs(User::class, 'admin',  function (Faker $faker) {
    return [
        'name' => 'admin_mf',
        'email' => 'admin.million.flowers.vn@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('459t1as1tr'), // password
        'remember_token' => Str::random(10),
    ];
});
