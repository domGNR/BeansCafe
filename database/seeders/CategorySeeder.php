<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'caffe in polvere',
            'slug' => 'caffe-in-polvere'
        ]);

        DB::table('categories')->insert([
            'name' => 'caffe in cialde',
            'slug' => 'caffe-in-cialde'
        ]);

        DB::table('categories')->insert([
            'name' => 'caffe in grani',
            'slug' => 'caffe-in-grani'
        ]);
    }
}
