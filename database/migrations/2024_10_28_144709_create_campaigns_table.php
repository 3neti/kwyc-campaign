<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->index();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('webhook', 2048)->nullable();
            $table->schemalessAttributes('meta');
//            $table->foreignId('user_id')->nullable();
            $table->nullableMorphs('agent');
            $table->foreignId('team_id')->nullable();
            $table->timestamp('enabled_at')->nullable();
            $table->timestamp('valid_until')->nullable();
            $table->timestamps();
//            $table->unique(['user_id', 'name']);
            $table->unique(['agent_type', 'agent_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
