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
        Schema::table('tahanan', function (Blueprint $table) {
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('kewarganegaraan', ['WNI', 'WNA']);
            $table->string('agama');
            $table->string('pendidikan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tahanan', function (Blueprint $table) {
            $table->dropColumn('tempat_lahir');
            $table->dropColumn('tgl_lahir');
            $table->dropColumn('jenis_kelamin');
            $table->dropColumn('kewarganegaraan');
            $table->dropColumn('agama');
            $table->dropColumn('pendidikan');
        });
    }
};
