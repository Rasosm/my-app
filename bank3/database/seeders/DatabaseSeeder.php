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

        DB::table('customers')->insert([
            'name' => 'Saulė',
            'surname' => 'Saulaitė',
            'account_number' => 'LT82 7300 0070 7151 1011',
            'personal_id' => '49901150735',
            'balance' => '350046.45',
        ]);
        DB::table('customers')->insert([
            'name' => 'Gabrielė',
            'surname' => 'Gabrelytė',
            'account_number' => 'LT82 7300 0070 8400 1034',
            'personal_id' => '60908250142',
            'balance' => '90450.99',
        ]);
        DB::table('customers')->insert([
            'name' => 'Tadas',
            'surname' => 'Tadaitis',
            'account_number' => 'LT82 7300 0070 8400 8924',
            'personal_id' => '60908120142',
            'balance' => '872.30',
        ]);
    }
}
