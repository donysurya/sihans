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
        Schema::table('besuk', function (Blueprint $table) {
            $table->string('status')->default('Menunggu Konfirmasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('besuk', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
