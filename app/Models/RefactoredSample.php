<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefactoredSample extends Model
{
    use HasFactory;

    protected $table = 'samples';

    public $timestamps = false;

    protected $fillable = [
        'device_id',
        'temp',
        'created_at',
    ];
}
