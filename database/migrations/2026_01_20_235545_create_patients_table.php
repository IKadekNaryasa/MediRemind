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
        Schema::create('patients', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('namaPasien')->unique();
            $table->enum('jenisKelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggalLahir');
            $table->string('alamat');
            $table->string('wa')->unique();
            $table->time('jam');
            $table->enum('status', ['active', 'nonactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
