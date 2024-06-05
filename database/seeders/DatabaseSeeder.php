<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        /*Order::factory(100)
            ->has(Order_detail::factory()->count(1))
            ->create();
        Customer::factory(7)->create();
        Product::factory(55)->create();*/
        Order::factory(1)->create();
    }
}
