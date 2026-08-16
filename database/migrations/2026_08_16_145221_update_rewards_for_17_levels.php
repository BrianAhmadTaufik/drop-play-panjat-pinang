<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rewards', function (Blueprint $table) {
            $table->unsignedInteger('level')
                ->nullable()
                ->after('id');

            $table->unsignedBigInteger('threshold_amount')
                ->nullable()
                ->after('name');

            $table->dropColumn('value');

            $table->dropColumn('unlock_percentage');
        });
    }

    public function down(): void
    {
        Schema::table('rewards', function (Blueprint $table) {
            $table->unsignedBigInteger('value')
                ->nullable();

            $table->unsignedTinyInteger('unlock_percentage')
                ->nullable();

            $table->dropColumn([
                'level',
                'threshold_amount',
            ]);
        });
    }
};