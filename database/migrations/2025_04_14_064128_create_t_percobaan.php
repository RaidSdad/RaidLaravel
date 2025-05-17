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
        Schema::create('t_percobaan', function (Blueprint $table) {
            $table->id();
            $table->integer('nis');
            $table->string('nama', 100);
            $table->string('jenis_kelamin', 1);
            $table->string('ttl', 100);
            $table->integer('umur');
            $table->string('hobi', 100);
            $table->string('agama', 100);
            $table->string('makanan favorit', 100);
            $table->string('alamat', 250);
            $table->string('cita-cita', 100);
            $table->string('minuman favorit', 100);
            $table->string('musik favorit', 100);
            $table->integer('ukuran sepatu');
            $table->integer('ukuran baju');
            $table->integer('ukuran celana');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_percobaan');
    }
};
