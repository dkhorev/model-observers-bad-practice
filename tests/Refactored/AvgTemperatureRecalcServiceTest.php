<?php

declare(strict_types=1);

namespace Tests\Refactored;

use App\Models\AvgTemperature;
use App\Models\RefactoredSample;
use App\Services\RefactoredAvgTemperatureRecalcService;
use Tests\TestCase;

class AvgTemperatureRecalcServiceTest extends TestCase
{
    /** @test */
    public function when_has_existing_100_samples_then_10_last_average_is_correct(): void
    {
        for ($i = 0; $i < 100; $i++) {
            RefactoredSample::factory()->create([
                'device_id'  => 'xyz',
                'temp'       => 1,
                'created_at' => now()->subMinutes($i),
            ]);
        }
        $sample = RefactoredSample::factory()->create(['device_id' => 'xyz', 'temp' => 11, 'created_at' => now()]);

        // pre assert
        $this->assertCount(0, AvgTemperature::all());

        // act
        $service = new RefactoredAvgTemperatureRecalcService();
        $service->withLatestTenSamples($sample);

        // assert
        $avgTemp = AvgTemperature::where('device_id', 'xyz')->first();
        $this->assertSame((float)((9 + 11) / 10), $avgTemp->temp);
    }
}
