<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory(1)->create(['name' => 'TestUser', 'email' => 'testuser@gmails.com']);
         \App\Models\User::factory(10)->create();
         \App\Models\Recipe::factory(50)->create();
    }
}
