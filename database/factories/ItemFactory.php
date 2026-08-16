<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code_no'=>$this->faker->word(),
            'name'=>$this->faker->word(),
            'image'=>$this->faker->imageUrl(),
            'price'=>$this->faker->randomFloat(2, 1, 100),  
            'discount'=>$this->faker->randomFloat(2, 0, 50),
            'in_stock'=>$this->faker->numberBetween(0, 100),
            'description'=>$this->faker->paragraph(),
            'category_id'=>$this->faker->numberBetween(1, 10),
        ];
    }
}
