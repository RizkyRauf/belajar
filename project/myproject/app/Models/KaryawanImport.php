<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KaryawanImport implements ToModel, WithHeadingRow
{
    
    public function model(array $row)
    {
        $defaultCuti = 12; // set nilai default cuti karyawan
        $cuti = isset($row['cuti_karyawan']) ? $row['cuti_karyawan'] : $defaultCuti;
        
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
            'cuti_karyawan' => $cuti,
        ]);
    }

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