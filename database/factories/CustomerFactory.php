<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public $timestamps = false;
    protected $model = Customer::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name, 
            'address' => $this->faker->address, 
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'status' => 1,
            'registerby' => 1,
        ];
    }
}
