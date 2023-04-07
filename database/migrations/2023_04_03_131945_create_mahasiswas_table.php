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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->integer('nim');
            $table->unique('nim');
            $table->string('nama');
            $table->string('jeniskelamin');
            $table->string('tmptlhr');
            $table->date('tgllhr');
            $table->string('jurusan');
            $table->integer('lamastudi');
            $table->decimal('ipk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
