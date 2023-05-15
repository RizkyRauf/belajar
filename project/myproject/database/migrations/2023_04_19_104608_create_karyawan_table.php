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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('karyawan_id')->length(11);
            $table->unsignedInteger('nik')->unique();
            $table->string('nama_lengkap');
            $table->string('role');
            $table->string('nama_panggilan');
            $table->string('tempat_lahir');
            $table->date('tanggal');
            $table->string('agama');
            $table->string('divisi');
            $table->string('golongan_darah');
            $table->string('jenis_kelamin');
            $table->string('jumlah_anak');
            $table->string('pendidikan');
            $table->string('status');
            $table->unsignedBigInteger('nik_ktp')->unique();
            $table->unsignedBigInteger('no_npwp')->unique();
            $table->unsignedBigInteger('nomer_telepon');
            $table->text('alamat');
            $table->string('email');
            $table->string('email_kantor');
            $table->string('skype');
            $table->string('lokasi_kantor');
            $table->string('cuti_karyawan')->default('12');
            $table->string('avatar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
