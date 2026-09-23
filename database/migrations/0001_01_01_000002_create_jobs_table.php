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
        Schema::create('jobs', function (Blueprint $table) { // Jobs table.
            $table->id(); // Primary key.
            $table->string('queue')->index(); // Queue name.
            $table->longText('payload'); // Job data.
            $table->unsignedSmallInteger('attempts'); // Attempt count.
            $table->unsignedInteger('reserved_at')->nullable(); // Reservation time.
            $table->unsignedInteger('available_at'); // Available time.
            $table->unsignedInteger('created_at'); // Creation time.
        });

        Schema::create('job_batches', function (Blueprint $table) { // Batches table.
            $table->string('id')->primary(); // Batch ID.
            $table->string('name'); // Batch name.
            $table->integer('total_jobs'); // Total jobs.
            $table->integer('pending_jobs'); // Pending jobs.
            $table->integer('failed_jobs'); // Failed jobs.
            $table->longText('failed_job_ids'); // Failed job IDs.
            $table->mediumText('options')->nullable(); // Batch options.
            $table->integer('cancelled_at')->nullable(); // Cancellation time.
            $table->integer('created_at'); // Creation time.
            $table->integer('finished_at')->nullable(); // Completion time.
        });

        Schema::create('failed_jobs', function (Blueprint $table) { // Failed jobs table.
            $table->id(); // Primary key.
            $table->string('uuid')->unique(); // Unique job ID.
            $table->string('connection'); // Queue connection.
            $table->string('queue'); // Queue name.
            $table->longText('payload'); // Job data.
            $table->longText('exception'); // Error details.
            $table->timestamp('failed_at')->useCurrent(); // Failure time.

            $table->index(['connection', 'queue', 'failed_at']); // Failure index.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // Remove tables.
    {
        Schema::dropIfExists('jobs'); // Drop jobs table.
        Schema::dropIfExists('job_batches'); // Drop batches table.
        Schema::dropIfExists('failed_jobs'); // Drop failed jobs table.
    }
};
