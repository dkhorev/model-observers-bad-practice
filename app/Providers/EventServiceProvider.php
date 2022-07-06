<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\SampleCreatedEvent;
use App\Listeners\RecalcAvgTemperatureListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * @var array<string, array<string>>
     */
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
