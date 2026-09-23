<?php

use Illuminate\Database\Migrations\Migration; // Migration base.
use Illuminate\Database\Schema\Blueprint; // Schema blueprint.
use Illuminate\Support\Facades\Schema; // Schema facade.

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void // Create tables.
    {
        Schema::create('cache', function (Blueprint $table) { // Cache table.
            $table->string('key')->primary(); // Cache key.
            $table->mediumText('value'); // Cache value.
            $table->bigInteger('expiration')->index(); // Expiration time.
        });

        Schema::create('cache_locks', function (Blueprint $table) { // Cache locks table.
            $table->string('key')->primary(); // Lock key.
            $table->string('owner'); // Lock owner.
            $table->bigInteger('expiration')->index(); // Expiration time.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // Remove tables.
    {
        Schema::dropIfExists('cache'); // Drop cache table.
        Schema::dropIfExists('cache_locks'); // Drop locks table.
    }
};
