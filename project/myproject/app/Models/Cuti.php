<?php

namespace App\Models;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cuti extends Model
{
    protected $table = 'cuti';
    protected $fillable = [
        'nik_karyawan',
        'nama_karyawan',
        'divisi',
        'tanggal_mulai',
        'tanggal_selesai',
        'sisa_cuti',
        'status',
        'keterangan',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'nik_karyawan', 'nik');
    }
}
