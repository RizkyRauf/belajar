<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'cuti';
    protected $fillable =[
        'nik_karyawan',
        'nama_karyawan',
        'divisi',
        'tanggal_mulai',
        'tanggal_selesai',
        'sisa_cuti',
        'keterangan',
    ];

}