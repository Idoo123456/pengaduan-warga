<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('nama');

            $table->foreignId('kategori_pengaduan_id')
                ->constrained('kategori_pengaduan')
                ->cascadeOnDelete();

            $table->string('judul');
            $table->text('isi_pengaduan');
            $table->string('jalan');
            $table->string('rt', 5);
            $table->string('rw', 5);
            $table->string('status')->default('Dikirim');
            $table->string('foto')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
