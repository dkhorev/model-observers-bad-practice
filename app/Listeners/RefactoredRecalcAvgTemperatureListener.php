<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\SampleCreatedEvent;
use App\Services\AvgTemperatureRecalcService;

class RefactoredRecalcAvgTemperatureListener
{
    public function __construct(protected AvgTemperatureRecalcService $recalcAvg)
    {
    }

    public function handle(SampleCreatedEvent $event): void
    {
        $this->recalcAvg->withLatestTenSamples($event->sample);
    }
}
