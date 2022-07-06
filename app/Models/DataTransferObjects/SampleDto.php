<?php

declare(strict_types=1);

namespace App\Models\DataTransferObjects;

use App\Http\Requests\StoreSampleRequest;

final class SampleDto
{
    private function __construct(public string $device_id, public float $temp)
    {
    }

    public static function fromRequest(StoreSampleRequest $request): self
    {
        return new SampleDto($request->device_id, (float)$request->temp);
    }
}
