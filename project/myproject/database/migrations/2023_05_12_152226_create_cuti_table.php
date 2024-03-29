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
        Schema::create('cuti', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nik_karyawan');
            $table->string('nama_karyawan');
            $table->string('divisi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('sisa_cuti');
            $table->string('status');
            $table->string('keterangan');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuti');
    }
};
