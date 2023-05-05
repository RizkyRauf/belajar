<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Karyawan;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class KaryawanImport implements ToModel
{
    //jika avatar tidak kosong, akan di isi default.jpg untuk di database
    protected $attributes = [
        'avatar' => 'default.jpg',
    ];
    
    public function model(array $row)
    {
        
        $karyawan = new Karyawan([
            'nik' => $row[0],
            'nama_lengkap' => $row[1],
            'role' => $row[2],
            'nama_panggilan' => $row[3],
            'tempat_lahir' => $row[4],
            'tanggal' => $row[5],
            'agama' => $row[6],
            'divisi' => $row[7],
            'golongan_darah' => $row[8],
            'jenis_kelamin' => $row[9],
            'jumlah_anak' => $row[10],
            'pendidikan' => $row[11],
            'status' => $row[12],
            'nik_ktp' => $row[13],
            'no_npwp' => $row[14],
            'nomer_telepon' => $row[15],
            'alamat' => $row[16],
            'email' => $row[17],
            'email_kantor' => $row[18],
            'skype' => $row[19],
            'lokasi_kantor' => $row[20],
            'avatar' => $row[21] ?? $this->attributes['avatar'],
        ]);

        $karyawan->save();
        return $karyawan;
    }
}
