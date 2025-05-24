<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password123'), // password yang di-hash
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
