<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\AvgTemperature;
use App\Models\RefactoredSample;
use App\Models\Sample;

class AvgTemperatureRecalcService
{
    public function withLatestTenSamples(Sample|RefactoredSample $sample): void
    {
        $average = Sample::where('device_id', $sample->device_id)
            ->orderByDesc('created_at')
            ->limit(10)
            ->avg('temp');

        AvgTemperature::updateOrCreate([
            'device_id' => $sample->device_id,
        ], [
            'temp' => $average ?? 0,
        ]);
    }
}
