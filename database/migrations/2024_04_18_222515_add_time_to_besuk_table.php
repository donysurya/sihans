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
            $table->string('nomor_surat')->nullable();
            $table->date('tgl_kunjungan')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('besuk', function (Blueprint $table) {
            $table->dropColumn('nomor_surat');
            $table->dropColumn('tgl_kunjungan');
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
        });
    }
};
