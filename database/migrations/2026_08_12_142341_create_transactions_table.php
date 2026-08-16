<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('participant_id')
                ->constrained()
                ->cascadeOnDelete();

            // Nominal hanya untuk perhitungan internal
            // Tidak akan ditampilkan ke publik
            $table->unsignedBigInteger('amount');

            $table->string('source')->default('admin');

            $table->string('reference')->nullable();

            $table->timestamps();

            $table->index([
                'event_id',
                'participant_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};