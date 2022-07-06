<?php

declare(strict_types=1);

namespace App\Models;

use App\Events\SampleCreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'device_id',
        'temp',
        'created_at',
    ];

    protected $dispatchesEvents = [
        'created' => SampleCreatedEvent::class,
    ];
}
