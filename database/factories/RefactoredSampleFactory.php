<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RefactoredSample>
 */
class RefactoredSampleFactory extends Factory
{
    public function definition()
    {
        return [
            'device_id' => fake()->uuid(),
            'temp'      => fake()->numberBetween(-10, 30),
        ];
    }
}
