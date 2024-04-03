<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public $timestamps = false;
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->word, 
            'description' => $this->faker->sentence, 
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'stock' => $this->faker->randomNumber(2), 
            //'created_at' => $this->faker->randomNumber(2),
            //'updated_at' => $this->faker->randomNumber(2),
        ];
    }
}
