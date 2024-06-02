<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add dataa direct to the database only once
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@hotmail.com',
        //     'password' => Hash::make("p@ssw0rd"),
        // ]);

        // Add much data from factory
        // Old method
        // factory(App\User::class, 20)->create();

        // new method
        User::factory(10)->create();
    }
}
