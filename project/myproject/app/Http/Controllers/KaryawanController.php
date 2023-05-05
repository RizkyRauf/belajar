<?php

namespace App\Http\Controllers;
use App\Models\KaryawanImport;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $data_karyawan = \App\Models\Karyawan::query();

        //method pencarian
        if ($request->has('nama_lengkap')) {
            $data_karyawan = $data_karyawan->where('nama_lengkap', 'LIKE', '%'.$request->nama_lengkap.'%');
        }

        if ($request->has('lokasi_kantor')) {
            $data_karyawan = $data_karyawan->where('lokasi_kantor', 'LIKE', '%'.$request->lokasi_kantor.'%');
        }
        
        $data_karyawan = $data_karyawan->paginate(10);
        return view('karyawan.index', compact('data_karyawan'));
    }

    public function create(Request $request)
    {
        
        //insert ke table Users
        $user = new \App\Models\User();
        $user->role = $request->role;
        $user->name = $request->nama_panggilan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = \Illuminate\Support\str::random(60);
        $user->save();
        
        //Insert ke table karyawan
        $request->request->add(['karyawan_id' => $user->id ]);
        $karyawan = \App\Models\Karyawan::create($request->all());

        return redirect('/karyawan')->with('sukses', 'Data berhasil diinput');
    }

    public function edit($id)
    {
        $karyawan = \App\Models\Karyawan::find($id);
        return view('karyawan/edit', ['karyawan' => $karyawan]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $karyawan = \App\Models\Karyawan::find($id);
        $karyawan->update($request->all());
        
        //cek file upload
        if($request->hasFile('avatar')){
            //upload file kedalam folder // menyimpan
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            //upload kedalam database
            $karyawan->avatar = $request->file('avatar')->getClientOriginalName();
            $karyawan->save();
        }

        // Jika Role dalam database karyawan di update maka role dama database user ikut di update
        $user = \App\Models\User::find($karyawan->karyawan_id);
        $user->role = $request->role;
        $user->save();

        return redirect('/karyawan')->with('sukses', 'Data berhasil di update');
    }

    public function delete($id)
    {
        // menghapus berdasarkan id di table karyawan
        $karyawan = \App\Models\Karyawan::find($id); 
        // menghapus berdasarkan id dan mencocokan dari table karyawan
        $user = \App\Models\User::where('id', $karyawan->karyawan_id)->first(); 
        $karyawan->delete($karyawan);
        $user->delete($user);
        return redirect('/karyawan')->with('sukses', 'Data berhasil dihapus');
    }

    //method import_karyawan
    public function import(Request $request)
    {   
        //validasi untuk file
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        
        $rows = Excel::toArray(new KaryawanImport, $request->file('file'));

        foreach ($rows[0] as $row) {
            // Insert ke table Users
            $user = new \App\Models\User();
            $user->role = $row[2];
            $user->name = $row[3];
            $user->email = $row[17];
            $user->password = bcrypt('rahasia');
            $user->remember_token = \Illuminate\Support\str::random(60);
            $user->save();
            
            
            // Insert ke table karyawan
            $karyawan = new \App\Models\Karyawan();
            $karyawan->fill([
                'karyawan_id' => $user->id,
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
                'avatar' => 'default.jpg',
            ]);
            $karyawan->save();
            
            
        }

        return redirect()->back()->with('success', 'Data karyawan berhasil diimport!');
    }

}
