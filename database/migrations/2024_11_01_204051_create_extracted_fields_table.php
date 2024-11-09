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
        Schema::create('extracted_fields', function (Blueprint $table) {
            $table->foreignUuid('checkin_id')->constrained()->onUpdate('cascade')->onDelete('cascade');;
            $table->string('field')->index();
            $table->string('value');
            $table->primary(['checkin_id', 'field']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extracted_fields');
    }
};
