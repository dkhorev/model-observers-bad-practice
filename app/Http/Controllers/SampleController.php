<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function store(Request $request): void
    {
        Sample::create(
            array_merge($request->all(), ['created_at' => now()])
        );
    }
}
