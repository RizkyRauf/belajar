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
        'avatar',
    ];

    public function getAvatar()
    {
        // jika avatar tidak ada, avatar akan di isi default avatar yang di ambil dari folder /public/images
        if(!$this->avatar){
            return asset('images/default.jpg');
        }

        //jika file ditemukan.
        return asset('images/'.$this->avatar);
    }
}
