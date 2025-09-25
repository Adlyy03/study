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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_telp', 20)->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('kelas')->nullable();   // bisa diganti foreignId kalau ada tabel kelas
            $table->string('jurusan')->nullable(); // bisa diganti foreignId kalau ada tabel jurusan
            $table->unsignedBigInteger('added_by')->nullable(); // id user yang nambahin
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // contoh kalau mau relasi ke tabel users
            // $table->foreign('added_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
