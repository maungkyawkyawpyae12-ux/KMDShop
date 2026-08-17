<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'voucher_no'=>$this->faker->word(),
            // 'total'=>$this->faker->randomFloat(2, 1, 100),
            // 'qty'=>$this->faker->numberBetween(1, 10),
            // 'payment_slip'=>$this->faker->imageUrl(),
            // 'status'=>$this->faker->randomElement(['pending', 'completed', 'cancelled']),
            // 'note'=>$this->faker->paragraph(),
            // 'item_id'=>$this->faker->numberBetween(1, 10),
            // 'payment_id'=>$this->faker->numberBetween(1, 10),
            // 'user_id' => User::factory(),       
             ];
    }
}
