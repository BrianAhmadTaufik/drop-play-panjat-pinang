<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();

            // Nama yang tampil di leaderboard
            $table->string('name');

            $table->timestamps();

            $table->unique('name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};