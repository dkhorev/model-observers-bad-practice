<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreSampleRequest;
use App\Models\DataTransferObjects\SampleDto;
use App\Models\Sample;
use App\Services\SampleConsumeService;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function store(Request $request): void
    {
        Sample::create(
            array_merge($request->all(), ['created_at' => now()])
        );
    }

    public function storeRefactored(StoreSampleRequest $request, SampleConsumeService $service): void
    {
        $service->newSample(SampleDto::fromRequest($request));
    }
}
