<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Karyawan;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class KaryawanImport implements ToModel, WithHeadingRow
{
    protected $attributes = [
        'avatar' => 'default.jpg',
    ];

    public function model(array $row)
    {
        // konversi nilai tanggal ke dalam format tanggal yang benar
        
        return new Karyawan([
            'nik' => $row['nik'],
            'nama_lengkap' => $row['nama_lengkap'],
            'role' => $row['role'],
            'nama_panggilan' => $row['nama_panggilan'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal' => $row['tanggal'],
            'agama' => $row['agama'],
            'divisi' => $row['divisi'],
            'golongan_darah' => $row['golongan_darah'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'jumlah_anak' => $row['jumlah_anak'],
            'pendidikan' => $row['pendidikan'],
            'status' => $row['status'],
            'nik_ktp' => $row['nik_ktp'],
            'no_npwp' => $row['no_npwp'],
            'nomer_telepon' => $row['nomer_telepon'],
            'alamat' => $row['alamat'],
            'email' => $row['email'],
            'email_kantor' => $row['email_kantor'],
            'skype' => $row['skype'],
            'lokasi_kantor' => $row['lokasi_kantor'],
            'avatar' => $row['avatar'] ?? $this->attributes['avatar'],
        ]);
    }
}
