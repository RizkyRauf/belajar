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

    public function formcuti()
    {
        return view('Cuti.formcuti');
    }

    public function storecuti(Request $request): RedirectResponse
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


        $karyawan = Karyawan::insert('nik', $request->nik_karyawan)->first();
        if(!$karyawan){
            return back()->with('error', 'Nik karyawan tidak ditemukan.');
        }

        $cuti_karyawan = $karyawan->cuti_karyawan; //get cuti karyawan
        $selisih_hari = date_diff(date_create($request->tanggal_mulai), date_create($request->tanggal_selesai))->format('%a');

        // Periksa apakah karyawan sudah memiliki cuti
        if ($cuti_karyawan == null) {
            return redirect('/form/cuti')->with('error', 'Karyawan belum memiliki cuti.');
        }
        
        // Periksa apakah karyawan memiliki cukup cuti
        if ($selisih_hari > $cuti_karyawan) {
            return redirect('/form/cuti')->with('error', 'Karyawan tidak memiliki cukup cuti.');
        }

        // Proses pengajuan cuti
        $cuti = new Cuti;
        $cuti->nik_karyawan = $karyawan->nik;
        $cuti->nama_karyawan = $request->nama_karyawan;
        $cuti->divisi = $request->divisi;
        $cuti->tanggal_mulai = $request->tanggal_mulai;
        $cuti->tanggal_selesai = $request->tanggal_selesai;
        $cuti->sisa_cuti = $cuti_karyawan; //tidak perlu dikurangi dengan selisih hari pengajuan cuti
        $cuti->status = 'Menunggu'; // Set status pengajuan cuti menjadi "Menunggu"
        $cuti->keterangan = $request->keterangan;
        $cuti->save();

        return redirect('/cuti', compact('cuti', 'karyawan'))->with('success', 'Pengajuan cuti berhasil disimpan');

    }

    public function edit($id)
    {
        $cuti = Cuti::findOrFail($id);
        
        return view('Cuti.editcuti', compact('cuti'));
    }

    public function update(Request $request, $id)
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
    
        $cuti = Cuti::findOrFail($id);
        $cuti->nik_karyawan = $request->nik_karyawan;
        $cuti->nama_karyawan = $request->nama_karyawan;
        $cuti->divisi = $request->divisi;
        $cuti->tanggal_mulai = $request->tanggal_mulai;
        $cuti->tanggal_selesai = $request->tanggal_selesai;
        $cuti->keterangan = $request->keterangan;
        $cuti->status = $request->status;
    
        // Kurangi nilai cuti_karyawan di database jika status 'Disetujui'
        if ($request->status == 'Disetujui') {
            $selisih_hari = date_diff(date_create($request->tanggal_mulai), date_create($request->tanggal_selesai))->format('%a');
            $cuti_karyawan = $cuti->karyawan->cuti_karyawan;
            $cuti->sisa_cuti = $cuti_karyawan - $selisih_hari;
            $cuti->karyawan->cuti_karyawan = $cuti->sisa_cuti;
            $cuti->karyawan->save();
        }

        $cuti->save();

        return redirect('/cuti')->with('success', 'Pengajuan cuti berhasil diupdate.');
    
    }
}
