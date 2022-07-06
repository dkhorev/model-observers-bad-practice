<?php

declare(strict_types=1);

use App\Http\Controllers\SampleController;
use Illuminate\Support\Facades\Route;

Route::post('sample', [SampleController::class, 'store']);
Route::post('sample-refactored', [SampleController::class, 'storeRefactored']);
