<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AvgTemperature>
 */
class AvgTemperatureFactory extends Factory
{
    public function definition()
    {
        return [
            'device_id' => fake()->uuid(),
            'avg_temp'  => fake()->numberBetween(-10, 30),
        ];
    }
}
