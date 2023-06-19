<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'full_name' => 'beanscafeadmin',
            'email' => 'beanscafeadmin@gmail.com',
            'password' => Hash::make('beanscafeadmin'),
            'role_id' => 1
        ]);
    }
}
