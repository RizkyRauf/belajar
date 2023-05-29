<?php

namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KaryawanExport implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings
{
    
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */


     public function collection()
    {
        return Karyawan::all();
        
    }
    

    public function headings(): array
    {
        return [
            'NIK',
            'Nama Lengkap',
            'Nama Panggilan',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Agama',
            'Divisi',
            'Golongan Darah',
            'Jenis Kelamin',
            'Jumlah Anak',
            'Pendidikan',
            'Status',
            'NIK KTP',
            'No NPWP',
            'Nomer Telepon',
            'Alamat',
            'Lokasi Kantor'
        ];
    }

    public function map($data): array
    {
        return [
            $data->nik,
            $data->nama_lengkap,
            $data->nama_panggilan,
            $data->tempat_lahir,
            $data->tanggal_lahir,
            $data->agama,
            $data->divisi,
            $data->golongan_darah,
            $data->jenis_kelamin,
            $data->jumlah_anak,
            $data->pendidikan,
            $data->status,
            $data->nik_ktp,
            $data->no_npwp,
            $data->nomer_telepon,
            $data->alamat,
            $data->lokasi_kantor,
        ];
    }
}