<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            'name' => 'beans',
            'slug' => 'beans'
        ]);

        DB::table('brands')->insert([
            'name' => 'lavazza',
            'slug' => 'lavazza'
        ]);

        DB::table('brands')->insert([
            'name' => 'bialetti',
            'slug' => 'bialetti'
        ]);
    }
}
