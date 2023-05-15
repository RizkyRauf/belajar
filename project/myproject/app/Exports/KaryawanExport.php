<?php

namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KaryawanExport implements FromQuery, WithMapping, ShouldAutoSize, WithHeadings
{
    use Exportable;
    public function query()
    {
        return Karyawan::query();
    }

    public function map($data_karyawan): array
    {
        return [
            $data_karyawan->nik,
            $data_karyawan->role,
            $data_karyawan->nama_lengkap,
            $data_karyawan->nama_panggilan,
            $data_karyawan->tempat_lahir,
            $data_karyawan->tanggal,
            $data_karyawan->agama,
            $data_karyawan->divisi,
            $data_karyawan->golongan_darah,
            $data_karyawan->jenis_kelamin,
            $data_karyawan->jumlah_anak,
            $data_karyawan->pendidikan,
            $data_karyawan->status,
            $data_karyawan->nik_ktp,
            $data_karyawan->no_npwp,
            $data_karyawan->nomer_telepon,
            $data_karyawan->alamat,
            $data_karyawan->email,
            $data_karyawan->email_kantor,
            $data_karyawan->skype,
            $data_karyawan->lokasi_kantor,
        ];
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
}
