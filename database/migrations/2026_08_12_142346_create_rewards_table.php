<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');

            // Nilai hadiah hanya untuk kebutuhan admin/internal
            $table->unsignedBigInteger('value')->default(0);

            // Contoh:
            // 20 = unlock saat progress 20%
            // 40 = unlock saat progress 40%
            $table->unsignedTinyInteger('unlock_percentage');

            // Urutan hadiah dari bawah ke atas
            $table->unsignedInteger('sort_order');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rewards');
    }
};