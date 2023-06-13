<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'product 1',
            'slug' => 'product-1',
            'description' => 'product 1',
            'stock_qty' => 50,
            'price' => 2.99,
            'cover' => 'NULL',
            'is_show' => true,
            'brand_id' => 1,
            'category_id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'product 2',
            'slug' => 'product-2',
            'description' => 'product 2',
            'stock_qty' => 50,
            'price' => 12.99,
            'cover' => 'NULL',
            'is_show' => true,
            'brand_id' => 2,
            'category_id' => 2
        ]);

        DB::table('products')->insert([
            'name' => 'product 3',
            'slug' => 'product-3',
            'description' => 'product 3',
            'stock_qty' => 50,
            'price' => 17.99,
            'cover' => 'NULL',
            'is_show' => true,
            'brand_id' => 3,
            'category_id' => 3
        ]);

        DB::table('products')->insert([
            'name' => 'product 4',
            'slug' => 'product-4',
            'description' => 'product 4',
            'stock_qty' => 50,
            'price' => 22.99,
            'cover' => 'NULL',
            'is_show' => true,
            'brand_id' => 3,
            'category_id' => 1
        ]);

        DB::table('products')->insert([
            'name' => 'product 5',
            'slug' => 'product-5',
            'description' => 'product 5',
            'stock_qty' => 50,
            'price' => 36.99,
            'cover' => 'NULL',
            'is_show' => true,
            'brand_id' => 2,
            'category_id' => 1
        ]);
    }
}
