<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public $timestamps = false;
    protected $model = Order::class;
    public function definition(): array
    {
        return [
            'dateOrder' => $this->faker->dateTime(),
            'total' => $this->faker->randomFloat(2, 0, 1000),
            'route'=> $this->faker->colorName(),
            'customers_id'=>\App\Models\Customer::factory(),
            'status' => 1,
            'registerby' => 1,
        ];
    }
}
