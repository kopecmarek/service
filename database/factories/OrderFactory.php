<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity' => $quantity = $this->faker->biasedNumberBetween(1,10),
            'client_id' => $this->faker->biasedNumberBetween(1,25),
            'price' => $price = $this->faker->numberBetween(0, 55),
            'total' => $price * $quantity,
            'type' => $this->faker->randomElement(['Zwykłe', 'Hybrydowe', 'Zaokraglnae', 'Cale', 'Najtańsze']),
            'brand' => $this->faker->randomElement(['Samsung', 'LG', 'Xiaomi', 'Lenovo', 'Huawei','One Plus', 'Nokia']),
            'model' => $this->faker->asciify('**') . '-' . $this->faker->unique()->numberBetween(1000,9999),
        ];
    }
}
