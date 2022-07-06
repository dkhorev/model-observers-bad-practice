<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('avg_temperatures', static function (Blueprint $table) {
            $table->id();
            $table->string('device_id');
            $table->float('temp');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('avg_temperatures');
    }
};
