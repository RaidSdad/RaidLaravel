<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        // $data['siswa'] = \DB::table('t_siswa')
        // ->orderBy('jenis_kelamin')
        //->get();

        $data ['kelas'] = Kelas::orderBy('jenis_kelamin')->get();
        return view('t_kelas', $data);
    }
    
    public function store(Request $request)
{
    $rule = [
        'nama_kelas' => 'required|numeric',
        'jurusan' => 'required|string',
        'lokasi_ruangan' => 'required',
        'nama_wali_kelas' => 'required',
    ];

    $request->validate($rule);

    $input = $request->all();
    $status = Kelas::create($input);

    if ($status) {
        return redirect('/kelas')->with('success', 'Data berhasil ditambahkan');
    } else {
        return redirect('/kelas/create')->with('error', 'Data gagal ditambahkan');
    }
}


    public function update(Request $request, $id)
    {
        $rule = [
            'nama_kelas' => 'required|numeric',
            'jurusan' => 'required|string',
            'lokasi_ruangan' => 'required',
            'nama_wali_kelas' => 'required',
        ];
        $request->validate($rule);

        $input = $request->all();
        // unset($input['_token']);
        // unset($input['_method']);

        // $status = \DB::table('t_siswa')->where('id', $id)->update($input);

        $kelas =Kelas::find($id);
        // $status = $kelas->update($input);
        $kelas->nama_kelas = $input['nama_kelas'];
        $kelas->jurusan = $input['jurusan'];
        $kelas->lokasi_ruangan = $input['lokasi_ruangan'];
        $kelas->nama_wali_kelas = $input['nama_wali_kelas'];
        $status = $kelas->update();

        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/kelas/create')->with('error', 'Data gagal diubah');
        }
    }

    public function destroy(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $status = $kelas->delete();

        // $status = \DB::table('t_kelas')->where('id', $id)->delete();

        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect('/kelas/create')->with('error', 'Data gagal dihapus');
        }
    }

        public function indexx()
    {
        // Menampilkan data kelas dari tabel t_kelas
        $siswa = DB::table('t_kelas')
                ->get();
        return view('t_kelas', compact('kelas'));
    }

    
    function edit(Request $request, $id)
    {
        $kelas = DB::table('t_kelas')->find($id);
        return view('kelas.form', compact('kelas'));
    }
        public function t_kelas() {
        $kelas = DB::table('t_kelas')->get(); 
        return view('t_kelas', compact('kelas'));
    }
}











// class KelasController extends Controller
// {


//     public function index5() {
//         $kelas = DB::table('t_kelas')->get();   
//         return view('t_kelas', compact('kelas'));
//     }

//     public function index6() {
//         $kelas = DB::table('t_kelas')
//                     ->where('nama_wali_kelas', 'like', 'A%')
//                     ->get();
//         return view('t_kelas', compact('kelas'));
//     }
    
//     public function index7() {
//         $kelas = DB::table('t_kelas')->select('jurusan', 'nama_kelas')->get();
//         return view('t_kelas', compact('kelas'));
//     }
    
//     public function index8() {
//         $kelas = DB::table('t_kelas')
//                     ->where('jurusan', 'like', 'Rekayasa Perangkat Lunak%')
//                     ->get();
//         return view('t_kelas', compact('kelas'));
//     }
    // public function create()
    // {
    //     // Menampilkan form input siswa
    //     return view('kelas.form');
    // }

    // public function store(Request $request)
    // {
    //     // Menyimpan data siswa baru ke database
    //     $input = $request->except('_token');
    //     $status = DB::table('t_kelas')->insert($input);

    //     if ($status) {
    //         return redirect('/kelas')->with('success', 'Data berhasil ditambahkan');
    //     } else {
    //         return redirect('/kelas/create')->with('error', 'Data gagal ditambahkan');
    //     }
    // }

//     function store(Request $request)
//     {
//         $request->validate([
//             'nama_kelas' => 'required|string',
//             'jurusan' => 'required|string',
//             'lokasi_ruangan' => 'required',
//             'nama_wali_kelas' => 'required',
//         ]);

//         $input = $request->all();
//     }

//     function edit(Request $request, $id)
//     {
//         $kelas = DB::table('t_kelas')->find($id);
//         return view('kelas.form', compact('kelas'));
//     }


//     function update(Request $request, $id)
//     {
//     $request->validate([
//         'nama_kelas' => 'required',
//         'jurusan' => 'required',
//         'lokasi_ruangan' => 'max:6',
//         'nama_wali_kelas' => 'required',
//     ]);

//     $input = $request->all();
//     unset($input['_token']);
//     unset($input['_method']);
//     $status = DB::table('t_kelas')->where('id', $id)->update($input);
//     if ($status) {
//         return redirect('/kelas')->with('success', 'Data berhasil di ubah');
//     } else {
//         return redirect('kelas/edit/' . $id)->with('error', 'Data gagal di ubah');
//     }
//     } 

//     function destroy($id)
//     {
//         $status = DB::table('t_kelas')->where('id', $id)->delete();
//         if ($status) {
//             return redirect('/kelas')->with('success', 'Data berhasil dihapus');
//         } else {
//             return redirect('/kelas')->with('error', 'Data gagal dihapus');
//         }
//     }
// }



