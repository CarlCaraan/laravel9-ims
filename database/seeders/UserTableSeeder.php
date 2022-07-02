<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => "Admin",
            'last_name' => "Account",
            'gender' => "Male",
            'email' => "bannedefused@gmail.com",
            'user_type' => "Admin",
            'password' => Hash::make('password'),
        ]);
    }
}
