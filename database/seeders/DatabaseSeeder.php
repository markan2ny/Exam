<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // User::factory(1)->create(
        //     [
        //         'name' => 'Mark Anthony',
        //         'email' => 'markan2nypascual@gmail.com',
        //         'password' => Hash::make('pascual11'),
        //     ]
        // );

        $this->call(
            [UserSeeder::class]
        );
     
    }
}
