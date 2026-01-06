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
    Schema::table('pengaduans', function (Blueprint $table) {
        $table->string('judul')->after('email');
        $table->string('kategori')->after('judul');
        $table->text('isi')->after('kategori');
        $table->string('foto')->nullable()->after('isi');
    });
}

public function down(): void
{
    Schema::table('pengaduans', function (Blueprint $table) {
        $table->dropColumn(['judul', 'kategori', 'isi', 'foto']);
    });
}

};
