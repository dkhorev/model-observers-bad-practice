<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class AvgTemperature
{
    use HasFactory;

    protected $fillable = [
        'device_id',
        'avg_temp',
    ];
}
