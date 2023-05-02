<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        //method pencarian
        if ($request->has('cari')){
            $data_karyawan = \App\Models\Karyawan::where('nama_lengkap', 'LIKE', '%'.$request->cari.'%')->get();
        }else{

            $data_karyawan = \App\Models\Karyawan::all();
        }
        return view('karyawan.index', ['data_karyawan' => $data_karyawan]);
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
        $karyawan = \App\Models\Karyawan::find($id);
        $karyawan->update($request->all());

        // perbarui role user terkait dengan karyawan
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

}
