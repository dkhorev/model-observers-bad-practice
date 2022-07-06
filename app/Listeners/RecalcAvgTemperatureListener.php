<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\SampleCreatedEvent;
use App\Models\AvgTemperature;
use App\Models\Sample;

class RecalcAvgTemperatureListener
{
    public function handle(SampleCreatedEvent $event): void
    {
        $average = Sample::orderByDesc('created_at')
            ->limit(10)
            ->avg('temp');

        AvgTemperature::updateOrCreate([
            'device_id' => $event->sample->device_id,
        ], [
            'temp' => $average ?? 0,
        ]);
    }
}
