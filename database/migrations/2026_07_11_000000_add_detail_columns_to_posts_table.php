<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     * Menambahkan kolom tambahan pada tabel posts yang sudah ada,
     * tanpa perlu menghapus data yang sudah tersimpan sebelumnya.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('image')->nullable()->after('content');
            $table->string('publisher')->default('Kabar Burung')->after('image');
            $table->string('category', 50)->default('Umum')->after('publisher');
            $table->date('tanggal_kejadian')->nullable()->after('category');
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['image', 'publisher', 'category', 'tanggal_kejadian']);
        });
    }
};
