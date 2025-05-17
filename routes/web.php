<?php


use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/t_kelas', [KelasController::class, 't_kelas']);
Route::get('/lokasi_ruangan', [KelasController::class, 'index5']);
Route::get('/wali_kelas_A', [KelasController::class, 'index6']);
Route::get('/jurusan', [KelasController::class, 'index7']);
Route::get('/RPL', [KelasController::class, 'index8']);
Route::get('/siswa', [SiswaController::class, 'indexx']);
Route::get('/siswa/create', [SiswaController::class, 'create']);
Route::post('/siswa', [SiswaController::class, 'store']);
Route::get('/kelas', [KelasController::class, 't_kelas']);
Route::get('/kelas/create', [KelasController::class, 'create']);
Route::post('/kelas', [KelasController::class, 'store']);
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
Route::patch('/siswa/{id}', [SiswaController::class, 'update']);
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);
Route::get('/kelas/edit/{id}', [KelasController::class, 'edit']);
Route::patch('/kelas/{id}', [KelasController::class, 'update']);
Route::delete('/kelas/{id}', [KelasController::class, 'destroy']);





// Route::get('/belajar2' , [SiswaController::class, 'index2']);
// Route::get('/belajar3' , [SiswaController::class, 'index3']);
// Route::get('/belajar4' , [SiswaController::class, 'index4']);






// Route::get('/belajar', function () {
//     echo 'Belajar Laravel, Tulisan ini ditampilkan dari Routes';
// });

// Route::get('/nama', function () {
//     echo 'Muhammad Raid Sadad';
// });

// Route::get('/nis', function () {
//     echo '2324 120129';
// });

// Route::get('/ttl', function () {
//     echo 'Bandung 18 November 2007';
// });

// Route::get('/nis', function () {
//     return view('nis');
// });

// Route::get('/belajar', function () {
//     $data['nama'] = "Saya Raid";
//     $data['jk'] = "Laki laki";
//     return view('belajar', $data);
// });
// Route::get('/belajar', function () {
//     $nama = 'Raid';
//     $jk = 'Laki laki';
//     $umur = '17';
//     $rumah = 'GBA';
//     $hobi = 'badmin';
//     $sekolah = 'SMKN 4 BDG';
//     $status = 'pelajar';

//     return view('belajar', compact('nama', 'jk','umur','rumah','hobi','sekolah','status'));
// });