<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sample
{
    use HasFactory;

    protected $fillable = [
        'device_id',
        'temp',
    ];
}
