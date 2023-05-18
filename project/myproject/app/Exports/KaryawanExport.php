<?php

namespace App\Exports;

use view;
use App\Models\Karyawan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KaryawanExport implements FromCollection, WithHeadings, WithMapping
{
    protected $karyawan;
    public function __construct($karyawan)
    {
        $this->karyawan = $karyawan;
    }

     public function collection()
    {
        return $this->karyawan;
    }
    public function headings(): array
    {
        return [
            'Nik',
            'Role',
            'Nama Lengkap',
            'Nama Panggilan',
            'Tempat Lahir',
            'Tanggal',
            'Agama',
            'Divisi',
            'Golongan Darah',
            'Jenis Kelamin',
            'Jumlah Anak',
            'Pendidikan',
            'Status',
            'Nik KTP',
            'NIk NPWP',
            'No Telpon',
            'Alamat',
            'Email Pribadi',
            'Email Kantor',
            'Skype',
            'Lokasi Kantor',
        ];
    }
    public function map($karyawan): array
    {
        return [
            $karyawan->nik,
            $karyawan->role,
            $karyawan->nama_lengkap,
            $karyawan->nama_panggilan,
            $karyawan->tempat_lahir,
            $karyawan->tanggal,
            $karyawan->agama,
            $karyawan->divisi,
            $karyawan->golongan_darah,
            $karyawan->jenis_kelamin,
            $karyawan->jumlah_anak,
            $karyawan->pendidikan,
            $karyawan->status,
            $karyawan->nik_ktp,
            $karyawan->no_npwp,
            $karyawan->nomer_telepon,
            $karyawan->alamat,
            $karyawan->email,
            $karyawan->email_kantor,
            $karyawan->skype,
            $karyawan->lokasi_kantor,
        ];
    }

   
}
