<?php

declare(strict_types=1);

namespace App\Services;

use App\Events\SampleCreatedEvent;
use App\Models\DataTransferObjects\SampleDto;
use App\Models\RefactoredSample;

class SampleConsumeService
{
    public function newSample(SampleDto $sample): RefactoredSample
    {
        $sample = RefactoredSample::create([
            'device_id'  => $sample->device_id,
            'temp'       => $sample->temp,
            'created_at' => now(),
        ]);

        event(new SampleCreatedEvent($sample));

        return $sample;
    }
}
