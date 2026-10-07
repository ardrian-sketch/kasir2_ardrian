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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->unique();
            $table->foreignId('nama_siswa');
            $table->set('jenis_kelamin', ['L', 'P']);
            $table->text('alamat')->nullable();
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('casecade');
            $table->enum('status',['aktif', 'nonaktif'])->nullable();
             $table->timestamp('created_at')->nullable();
            $table->timestamp('update_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
