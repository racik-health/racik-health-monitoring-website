<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dispenser_control_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('dispenser_id')->constrained()->cascadeOnDelete();
            $table->enum('status', ['in_progress', 'completed', 'failed'])->default('in_progress');
            $table->string('command');
            $table->string('response');
            $table->string('ip_address');
            $table->timestamp('executed_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispenser_control_logs');
    }
};
