<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $fillable = [
        'nik',
        'karyawan_id',
        'role',
        'nama_lengkap',
        'nama_panggilan',
        'tempat_lahir',
        'tanggal',
        'agama',
        'divisi',
        'golongan_darah',
        'jenis_kelamin',
        'jumlah_anak',
        'nik_ktp',
        'no_npwp',
        'nomer_telepon',
        'alamat',
        'email',
        'email_kantor',
        'skype',
        'lokasi_kantor',
        'status',
        'pendidikan',
    ];
}
