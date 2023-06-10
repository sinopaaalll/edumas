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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->date('tgl')->useCurrent();
            $table->foreignId('kategori_id')->constrained('kategoris')->onUpdate('cascade')->onDelete('cascade');
            $table->text('lokasi');
            $table->text('deskripsi');
            $table->string('image');
            $table->enum('status',['masuk','proses','selesai','ditolak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
