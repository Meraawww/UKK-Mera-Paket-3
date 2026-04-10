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
        Schema::table('siswas', function (Blueprint $table) {
            if (!Schema::hasColumn('siswas', 'nama_siswa')) {
                $table->string('nama_siswa');
            }
            if (!Schema::hasColumn('siswas', 'password')) {
                $table->string('password');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            if (Schema::hasColumn('siswas', 'nama_siswa')) {
                $table->dropColumn('nama_siswa');
            }
            if (Schema::hasColumn('siswas', 'password')) {
                $table->dropColumn('password');
            }
        });
    }
};
