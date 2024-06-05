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
            'photo' => randomPhoto(),
            'document' => $this->faker->unique()->numberBetween(1234567890, 2134567890),
            'address' => $this->faker->address, 
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'status' => 1,
            'registerby' => 1,
        ];
    }
}

function randomPhoto(): string
{
    return "photos/" . rand(1, 6) . ".jpg";
}
