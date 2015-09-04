<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Expense::class, function (Faker\Generator $faker) {
    return [
        'base_amount' => $faker->randomFloat(2,10,400),
        'description' => $faker->sentence(),
    ];
});

$factory->define(App\ExpenseSupplement::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'amount' => $faker->randomFloat(2,1,100),
        'commissionable' => $faker->numberBetween(0,1),
        'expense_id' => 1,
    ];
});

