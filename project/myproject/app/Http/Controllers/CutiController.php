<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CutiController extends Controller
{
    public function index(Request $request)
    {
        $cuti = Cuti::query();

        if ($request->has('nama_karyawan')) {
            $cuti->where('nama_karyawan', 'LIKE', '%'.$request->nama_karyawan.'%');
        }

        $cuti = $cuti->get();

        return view('Cuti.indexcuti', compact('cuti'));
    }

    public function formcuti(Request $request)
    {
        return view('Cuti.formcuti');
    }

    public function storecuti(Request $request, $name): RedirectResponse
    {
        $validated = $request->validate([
            'nik_karyawan' => 'required',
            'nama_karyawan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'keterangan' => 'required',
        ], [
            'nik_karyawan.required' => 'NIK harus diisi.',
            'nama_karyawan.required' => 'Nama harus diisi.',
            'tanggal_mulai.required' => 'Tanggal mulai harus diisi.',
            'tanggal_selesai.required' => 'Tanggal selesai harus diisi.',
            'keterangan.required' => 'Keterangan harus diisi.',
        ]);


        $karyawan = Karyawan::where('nik', $request->nik_karyawan)->first();
        if(!$karyawan){
            return back()->with('error', 'Karyawan tidak ditemukan.');
        }

        $cuti_karyawan = $karyawan->cuti_karyawan; //get cuti karyawan
        $selisih_hari = date_diff(date_create($request->tanggal_mulai), date_create($request->tanggal_selesai))->format('%a');

        //Periksa apakah karyawan sudah memiliki cuti
        if ($cuti_karyawan == null) {
            return redirect('/form/cuti/' . $name)->with('error', 'Karyawan belum memiliki cuti.');
        }
        
        //Periksa apakah karyawan memiliki cukup cuti
        if ($selisih_hari > $cuti_karyawan) {
            return redirect('/form/cuti/' . $name)->with('error', 'Karyawan tidak memiliki cukup cuti.');
        }

        
        // Proses pengajuan cuti
        $cuti = new Cuti;
        $cuti->nik_karyawan = $karyawan->nik;
        $cuti->nama_karyawan = $request->nama_karyawan;
        $cuti->divisi = $request->divisi;
        $cuti->tanggal_mulai = $request->tanggal_mulai;
        $cuti->tanggal_selesai = $request->tanggal_selesai;
        $cuti->sisa_cuti = $cuti_karyawan - $selisih_hari; // Kurangi cuti karyawan dengan selisih hari pengajuan cuti
        $cuti->keterangan = $request->keterangan;
        $cuti->save();

        // Kurangi nilai cuti_karyawan di database
        $karyawan->cuti_karyawan = $cuti_karyawan - $selisih_hari;
        $karyawan->save();
        
        return redirect('/cuti')->with('success', 'Pengajuan cuti berhasil disimpan.');

    }
}
