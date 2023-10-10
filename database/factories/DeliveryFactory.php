<?php

namespace Database\Factories;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delivery>
 */
class DeliveryFactory extends Factory
{
    protected $model = Delivery::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['fast', 'slow']),
            'sourceKladr' => $this->faker->postcode,
            'targetKladr' => $this->faker->postcode,
            'weight' => $this->faker->randomFloat(2, 0.1, 10),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'period' => $this->faker->numberBetween(1, 7),
            'coefficient' => $this->faker->randomFloat(2, 1, 2),
            'delivery_date' => $this->faker->dateTimeBetween('now', '+30 days')->format('Y-m-d'),
            'error' => null,
        ];
    }
}
