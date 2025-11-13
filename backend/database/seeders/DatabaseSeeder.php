<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $root_u = User::where('email', env('ROOT_EMAIL'))->first();
        if (!$root_u) {
            User::CREATE([
                'name' => 'User Test',
                'email' => env('ROOT_EMAIL'),
                'password' => bcrypt(env('ROOT_PASSWORD')),
            ]);
        }
    }
}
