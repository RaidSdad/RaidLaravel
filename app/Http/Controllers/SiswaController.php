<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;


class SiswaController extends Controller
{
    public function index()
    {
        // $data['siswa'] = \DB::table('t_siswa')
        // ->orderBy('jenis_kelamin')
        //->get();

        $data ['siswa'] = Siswa::orderBy('jenis_kelamin')->get();
        return view('index4', $data);
    }
    
    public function store(Request $request)
    {
        $rule = [
        'nis' => 'required|numeric',
        'nama_lengkap' => 'required|string',
        'jenis_kelamin' => 'required',
        'goldar' => 'required',
        ];

        $request->validate($rule);

        $input = $request->all();
        // unset($input['_token']);
        // $status = \DB::table('t_siswa')->insert($input);

        $status = Siswa::create($input);
        $siswa = new Siswa;
        $siswa->nis = $input['nis'];
        $siswa->nama_lengkap = $input['nama_lengkap'];
        $siswa->jenis_kelamin = $input['jenis_kelamin'];
        $siswa->goldar = $input['goldar'];
        $status = $siswa->save();

        if ($status) {
        return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
        } else {
        return redirect('/siswa/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function update(Request $request, $id)
    {
        $rule = [
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required',
            'goldar' => 'required',
        ];
        $request->validate($rule);

        $input = $request->all();
        // unset($input['_token']);
        // unset($input['_method']);

        // $status = \DB::table('t_siswa')->where('id', $id)->update($input);

        $siswa =Siswa::find($id);
        // $status = $siswa->update($input);
        $siswa->nis = $input['nis'];
        $siswa->nama_lengkap = $input['nama_lengkap'];
        $siswa->jenis_kelamin = $input['jenis_kelamin'];
        $siswa->goldar = $input['goldar'];
        $status = $siswa->update();

        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/siswa/create')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $status = $siswa->delete();

        // $status = \DB::table('t_siswa')->where('id', $id)->delete();

        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/siswa/create')->with('error', 'Data gagal dihapus');
        }
    }

        public function indexx()
    {
        // Menampilkan data siswa dari tabel t_siswa
        $siswa = DB::table('t_siswa')
                ->get();
        return view('index4', compact('siswa'));
    }

    
    function edit(Request $request, $id)
    {
        $siswa = DB::table('t_siswa')->find($id);
        return view('siswa.form', compact('siswa'));
    }
}









// class SiswaController extends Controller
// {


//     function create() {
//         return view('siswa.form');
//     }

//     function store(Request $request)
// {
//     $request->validate([
//         'nama_lengkap' => 'required|string',
//         'jenis_kelamin' => 'required|string',
//         'goldar' => 'required',
        
//     ]);
//     $input = $request->all();
//     unset($input['_token']);

//     $status = DB::table('t_siswa')->insert($input);

//     if ($status) {
//         return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
//     } else {
//         return redirect('/siswa/create')->with('error', 'Data gagal ditambahkan');
//     }
// }

   

    // function edit(Request $request, $id)
    // {
    //     $siswa = DB::table('t_siswa')->find($id);
    //     return view('siswa.form', compact('siswa'));
    // }


//     function update(Request $request, $id)
//     {
//     $request->validate([
//         'nis' => 'required|numeric',
//         'nama_lengkap' => 'required|string',
//         'jenis_kelamin' => 'required',
//         'goldar' => 'required',
//     ]);

//     $input = $request->all();
//     unset($input['_token']);
//     unset($input['_method']);
//     $status = DB::table('t_siswa')->where('id', $id)->update($input);
//     if ($status) {
//         return redirect('/siswa')->with('success', 'Data berhasil di ubah');
//     } else {
//         return redirect('siswa/edit/' . $id)->with('error', 'Data gagal di ubah');
//     }
//     } 

//     function destroy($id)
//     {
//         $status = DB::table('t_siswa')->where('id', $id)->delete();
//         if ($status) {
//             return redirect('/siswa')->with('success', 'Data berhasil dihapus');
//         } else {
//             return redirect('/siswa')->with('error', 'Data gagal dihapus');
//         }
//     }

// }

   



 
    
    
    
    
    // function index1() {
    //     $nama = "Sadad";
    //     $jk = "Laki-laki";
    //     return view ('belajar', compact('nama', 'jk'));

    // }
    // function index2() {
    //     $nama = "iting";
    //     $jk = "Laki-laki";
    //     return view ('belajar', compact('nama', 'jk'));

    // }
    // function index3() {
    //     $nama = "Aca";
    //     $jk = "Perempuan";
    //     return view ('belajar', compact('nama', 'jk'));

    // }
