<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Karyawan;

use Illuminate\Http\Request;
use App\Models\KaryawanImport;

use App\Exports\KaryawanExport;
use Illuminate\Foundation\Auth\User;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $karyawan = Karyawan::query();

        //method pencarian
        if ($request->has('nama_lengkap')) {
            $karyawan = $karyawan->where('nama_lengkap', 'LIKE', '%'.$request->nama_lengkap.'%');
        }

        if ($request->has('lokasi_kantor')) {
            $karyawan = $karyawan->where('lokasi_kantor', 'LIKE', '%'.$request->lokasi_kantor.'%');
        }
        
        $karyawan = $karyawan->paginate(10);
        return view('karyawan.index', compact('karyawan'));
    }

    public function create(Request $request)
    {

        //validasi karyawan
        $validated = $request->validate(
        [
            'nik' => 'required|min:3|max:10|unique:karyawan',
            'role' => 'required',
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal' => 'required',
            'agama' => 'required',
            'divisi' => 'required',
            'golongan_darah' => 'required',
            'jenis_kelamin' => 'required',
            'jumlah_anak' => 'required',
            'pendidikan' => 'required',
            'status' => 'required',
            'nik_ktp' => 'required|unique:karyawan',
            'no_npwp' => 'required|unique:karyawan',
            'nomer_telepon' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'email_kantor' => 'required',
            'skype' => 'required',
            'lokasi_kantor' => 'required',
        ],
        [
            'nik.required' => 'NIK harus diisi.',
            'nik.unique' => "'NIK' yang anda masukan sudah ada.",    
            'nik.min' => 'NIK harus terdiri dari minimal 3 karakter.',    
            'nik.max' => 'NIK tidak boleh lebih dari 10 karakter.',
            'role.required' => 'Role harus diisi.',
            'nama_lengkap.required' => 'Nama lengkap harus diisi.',
            'nama_panggilan.required' => 'Nama panggilan harus diisi.',
            'tempat_lahir.required' => 'Tempat lahir harus diisi.',
            'tanggal.required' => 'Tanggal harus diisi.',
            'agama.required' => 'Agama harus diisi.',
            'divisi.required' => 'Divisi harus diisi.',
            'golongan_darah.required' => 'Golongan darah harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
            'jumlah_anak.required' => 'Jumlah anak harus diisi.',
            'pendidikan.required' => 'Pendidikan harus diisi.',
            'status.required' => 'Status harus diisi.',
            'nik_ktp.required' => 'harus diisi.',
            'nik_ktp.unique' => "'Nik KTP' yang anda masukan sudah ada.",
            'no_npwp.required' => 'NIK harus diisi.',
            'no_npwp.unique' => "'No NPWP' yang anda masukan sudah ada.",
            'nomer_telepon.required' => 'Nomer telepon harus diisi.',
            'alamat.required' => 'Alamat harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email_kantor.required' => 'Email kantor harus diisi.',
            'skype.required' => 'Skype harus diisi.',
            'lokasi_kantor.required' => 'Lokasi kantor harus diisi.',
            
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
            $request->merge(['avatar' => 'default.jpg']);
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

    public function profile($nik)
    {
        $karyawan = Karyawan::where('nik', $nik)->first();
        return view('karyawan.profile', ['karyawan' => $karyawan]);
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
            $karyawan->avatar = 'default.jpg';
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
        $divisi = $request->input('divisi');
        $lokasi_kantor = $request->input('lokasi_kantor');

        //Query Karyawan sesuai dengan filter divisi dan lokasi kantor
        $data = Karyawan::query()
            ->when($divisi, function ($query) use ($divisi){
                return $query->where('divisi', $divisi);
            })
            ->when($lokasi_kantor, function ($query) use ($lokasi_kantor){
                return $query->where('lokasi_kantor', $lokasi_kantor);
            })
            ->get();

        // mengekspor data karyawan dalam format XLSX
        return Excel::download(new KaryawanExport($data), 'dataKaryawan-' . Carbon::now()->format('Y-m-d') . '.xlsx');
    }



    // public function export(Request $request)
    // {
    //     return Excel::download(
    //         new KaryawanExport(
    //             $divisi = $request->input('divisi'),
    //             $lokasi_kantor = $request->input('lokasi_kantor'),
    //         ), 
    //         'karyawan'. $divisi . '-' . $lokasi_kantor . '-' . Carbon::now()->format('Y-m-d') . '-' .  '.xlsx');
    // }

}

