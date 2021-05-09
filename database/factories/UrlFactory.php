<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Url;
use Faker\Generator as Faker;

$factory->define(Url::class, function (Faker $faker) {
    return [
        'short_code' => $faker->unique()->code,
        'full_url' => $faker->url,
        'counter' => 1,
        'expiry' => now()
    ];
});
