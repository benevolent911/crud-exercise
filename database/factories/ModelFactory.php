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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(RioLibrary\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),        
    ];
});

$factory->define(RioLibrary\Book::class, function (Faker\Generator $faker) {    

    return [
        'title' => ucwords($faker->catchPhrase),
        'author' => ucwords($faker->name($gender = null|'male'|'female')),
        'genre' => $faker->randomElement($array = array ('Horror','Romance','Thriller','Comedy','Tragedy','Melodrama','Urban','Suspense')),
        'library_section' => $faker->randomElement($array = array ('Circulation','Periodical Section','General Reference','Children\'s Section','Fiction')),
        'borrowed' => false,
    ];
});