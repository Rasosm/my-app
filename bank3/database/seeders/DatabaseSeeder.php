<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'Rasa',
            'email' => 'rasosm@gmail.com',
            'password' => Hash::make('321'),
        ]);
        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'briedis@gmail.com',
            'password' => Hash::make('321'),
        ]);
    }
}
