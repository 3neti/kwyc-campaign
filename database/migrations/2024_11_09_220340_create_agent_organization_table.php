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
        Schema::create('agent_organization', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();;
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();;
            $table->foreignUuid('campaign_id')->constrained()->cascadeOnDelete();;
            $table->unique(['user_id', 'team_id', 'campaign_id',]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_organization');
    }
};
