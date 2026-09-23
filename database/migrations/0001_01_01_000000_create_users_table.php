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
        Schema::create('users', function (Blueprint $table) { // Users table.
            $table->id(); // Primary key.
            $table->string('name'); // User name.
            $table->string('email')->unique(); // Unique email.
            $table->timestamp('email_verified_at')->nullable(); // Verification time.
            $table->string('password'); // Password field.
            $table->rememberToken(); // Remember token.
            $table->timestamps(); // Created and updated times.
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) { // Reset tokens table.
            $table->string('email')->primary(); // User email.
            $table->string('token'); // Reset token.
            $table->timestamp('created_at')->nullable(); // Creation time.
        });

        Schema::create('sessions', function (Blueprint $table) { // Sessions table.
            $table->string('id')->primary(); // Session ID.
            $table->foreignId('user_id')->nullable()->index(); // User reference.
            $table->string('ip_address', 45)->nullable(); // Client IP.
            $table->text('user_agent')->nullable(); // Browser details.
            $table->longText('payload'); // Session data.
            $table->integer('last_activity')->index(); // Last activity.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void // Remove tables.
    {
        Schema::dropIfExists('users'); // Drop users table.
        Schema::dropIfExists('password_reset_tokens'); // Drop tokens table.
        Schema::dropIfExists('sessions'); // Drop sessions table.
    }
};
