<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\User;

use App\Models\Karyawan;
use Illuminate\Http\Request;

use App\Models\KaryawanImport;
use App\Exports\KaryawanExport;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $data_karyawan = Karyawan::query();

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

        //validasi karyawan
        $validated = $request->validate(
        [
            'nik' => 'required|min:3|max:10|unique:karyawan',
            'nik_ktp' => 'required|unique:karyawan',
            'no_npwp' => 'required|unique:karyawan',
        ],
        [
            'nik.required' => 'NIK harus diisi.',    
            'nik.unique' => "'NIK' yang anda masukan sudah ada.",    
            'nik.min' => 'NIK harus terdiri dari minimal 3 karakter.',    
            'nik.max' => 'NIK tidak boleh lebih dari 10 karakter.',
            'nik_ktp.required' => 'harus diisi.',
            'nik_ktp.unique' => "'Nik KTP' yang anda masukan sudah ada.",
            'no_npwp.required' => 'NIK harus diisi.',
            'no_npwp.unique' => "'No NPWP' yang anda masukan sudah ada."
        ]);
                   
        //insert ke table Users
        $user = new User();
        $user->role = $request->role;
        $user->name = $request->nama_panggilan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = \Illuminate\Support\str::random(60);
        $user->save();
        
        //Insert ke table karyawan
        if(empty($request['cuti_karyawan'])) {
            $request['cuti_karyawan'] = 12;
        }
        
        if($request->hasFile('avatar')){
            // upload file kedalam folder // menyimpan
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            // set nilai ke kolom avatar
            $request->merge(['avatar' => $request->file('avatar')->getClientOriginalName()]);
        } else {
            // set nilai default ke kolom avatar
            $request->merge(['avatar' => 'default_avatar.jpg']);
        }

        $request->request->add(['karyawan_id' => $user->id ]);
        $karyawan = Karyawan::create($request->all());
  
        $karyawan->save();

        return redirect('/karyawan')->with('sukses', 'Data berhasil diinput');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        return view('karyawan/edit', ['karyawan' => $karyawan]);
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan->update($request->all());
        // dd($request->all());
        
        //cek file upload
        if($request->hasFile('avatar')){
            //upload file kedalam folder // menyimpan
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            //upload kedalam database
            $karyawan->avatar = $request->file('avatar')->getClientOriginalName();
            $karyawan->save();
        }

        // Jika Role dalam database karyawan di update maka role dama database user ikut di update
        $user = User::find($karyawan->karyawan_id);
        $user->role = $request->role;
        $user->save();

        return redirect('/karyawan')->with('sukses', 'Data berhasil di update');
    }

    public function delete($id)
    {
        // menghapus berdasarkan id di table karyawan
        $karyawan = Karyawan::find($id); 
        // menghapus berdasarkan id dan mencocokan dari table karyawan
        $user = User::where('id', $karyawan->karyawan_id)->first(); 
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

        foreach ($rows[0] as $row) 
        {
            // Insert ke table Users
            $user = new User();
            $user->role = $row['role'];
            $user->name = $row['nama_panggilan'];
            $user->email = $row['email'];
            $user->password = bcrypt('rahasia');
            $user->remember_token = \Illuminate\Support\str::random(60);
            $user->save();
            
            
            // Insert ke table karyawan
            $karyawan = new Karyawan();
            $karyawan->avatar = '';
            $karyawan->cuti_karyawan = isset($row['cuti_karyawan']) ? $row['cuti_karyawan'] : 12;
            $karyawan->fill([
                'karyawan_id' => $user->id,
                'nik' => $row['nik'],
                'nama_lengkap' => $row['nama_lengkap'],
                'role' => $row['role'],
                'nama_panggilan' => $row['nama_panggilan'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal' => Carbon::createFromFormat('Y-m-d', $row['tanggal'])->format('Y-m-d'),
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
            ]);
            $karyawan->save();   

        }

        return redirect()->back()->with('success', 'Data karyawan berhasil diimport!');
    }

    public function export(Request $request)
    {
        // membuat instance query builder untuk model Karyawan
        $query = Karyawan::query();

        // memproses kriteria pencarian (search query)
        if ($request->has('nama_lengkap')) {
            $query = $query->where('nama_lengkap', 'LIKE', '%'.$request->nama_lengkap.'%');
        }

        if ($request->has('lokasi_kantor')) {
            $query = $query->where('lokasi_kantor', 'LIKE', '%'.$request->lokasi_kantor.'%');
        }

        // mengambil data karyawan berdasarkan kriteria pencarian
        $data_karyawan = $query->get();

        // mengekspor data karyawan dalam format XLSX
        return (new KaryawanExport($data_karyawan))->download('dataKaryawan-' . Carbon::now()->format('Y-m-d') . '.xlsx');
        // return (new KaryawanExport)->download('dataKaryawan-' . Carbon::now()->format('Y-m-d') . '.xlsx');
    }

}
