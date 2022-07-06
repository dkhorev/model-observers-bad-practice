<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\SampleCreatedEvent;
use App\Listeners\RecalcAvgTemperatureListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        SampleCreatedEvent::class => [
            RecalcAvgTemperatureListener::class,
        ],
    ];

    public function shouldDiscoverEvents()
    {
        return false;
    }
}
