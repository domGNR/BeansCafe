<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_statuses')->insert([
            'name' => 'pagato'
        ]);

        DB::table('order_statuses')->insert([
            'name' => 'in elaborazione'
        ]);

        DB::table('order_statuses')->insert([
            'name' => 'spedito'
        ]);

        DB::table('order_statuses')->insert([
            'name' => 'consegnato',
        ]);
    }
}
