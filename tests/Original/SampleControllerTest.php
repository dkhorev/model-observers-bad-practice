<?php

declare(strict_types=1);

namespace Tests\Original;

use App\Models\AvgTemperature;
use App\Models\Sample;
use Tests\TestCase;

class SampleControllerTest extends TestCase
{
    /** @test */
    public function when_sample_is_sent_then_model_is_stored(): void
    {
        // act
        $this->post('/sample', [
            'device_id' => 'xyz',
            'temp'      => 10.5,
        ]);

        // assert
        $sample = Sample::first();
        $this->assertSame('xyz', $sample->device_id);
        $this->assertSame(10.5, $sample->temp);
    }

    /** @test */
    public function when_sample_is_sent_then_avg_model_is_stored(): void
    {
        Sample::factory()->create(['device_id' => 'xyz', 'temp' => 20]);

        // act
        $this->post('/sample', [
            'device_id' => 'xyz',
            'temp'      => 10,
        ]);

        // assert
        $sample = AvgTemperature::first();
        $this->assertSame('xyz', $sample->device_id);
        $this->assertSame(15.0, $sample->temp);
    }
}
