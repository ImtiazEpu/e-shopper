<?php

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Faker\Generator as Faker;


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name('male'),
        'email' => $faker->unique()->safeEmail,
        'phone_number' => $faker->phoneNumber,
        'password' => bcrypt('123456'),
        'email_verified_at' => Carbon::now(),
    ];
});
$factory->afterCreating(User::class, function ($user, $faker) {
    $roles = Role::where('name', 'user')->get();
    $user->roles()->sync($roles->pluck('id')->toArray());
});

