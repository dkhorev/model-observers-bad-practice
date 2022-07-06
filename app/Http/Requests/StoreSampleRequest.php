<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property-read string $device_id
 * @property-read string|float|int $temp
 */
class StoreSampleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'device_id' => ['required', 'string'],
            'temp'      => ['required', 'numeric'],
        ];
    }
}
