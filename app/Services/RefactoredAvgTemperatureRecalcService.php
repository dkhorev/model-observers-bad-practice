<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\AvgTemperature;
use App\Models\RefactoredSample;

class RefactoredAvgTemperatureRecalcService
{
    public function withLatestTenSamples(RefactoredSample $sample): void
    {
        $average = RefactoredSample::where('device_id', $sample->device_id)
            ->orderByDesc('created_at')
            ->limit(10)
            ->pluck('temp')
            ->avg();

        AvgTemperature::updateOrCreate([
            'device_id' => $sample->device_id,
        ], [
            'temp' => $average ?? 0,
        ]);
    }
}
