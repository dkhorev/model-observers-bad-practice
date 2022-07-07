<?php

declare(strict_types=1);

namespace Tests\Original;

use App\Models\AvgTemperature;
use App\Models\Sample;
use App\Services\AvgTemperatureRecalcService;
use Tests\TestCase;

class AvgTemperatureRecalcServiceTest extends TestCase
{
    /** @test */
    public function when_has_existing_100_samples_then_10_last_average_is_correct(): void
    {
        for ($i = 0; $i < 100; $i++) {
            Sample::factory()->create([
                'device_id'  => 'xyz',
                'temp'       => 1,
                'created_at' => now()->subMinutes($i),
            ]);
        }
        $sample = Sample::factory()->create(['device_id' => 'xyz', 'temp' => 11, 'created_at' => now()]);

        // pre assert
        // this will FAIL because average was already recounted 100x times when factory was creating 100x samples
        $this->assertCount(0, AvgTemperature::all());

        // act
        $service = new AvgTemperatureRecalcService();
        $service->withLatestTenSamples($sample);

        // assert
        $avgTemp = AvgTemperature::where('device_id', 'xyz')->first();
        $this->assertSame((float)((9 + 11) / 10), $avgTemp->temp);
    }
}
