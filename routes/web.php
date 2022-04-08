<?php
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\JabatanAdmin;
use App\Http\Controllers\TunjanganAdmin;
use App\Http\Controllers\PegawaiAdmin;
use App\Http\Middleware\checkrole;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});
// Route::middleware(['checkrole'])->group(function () {
// Route::get('/', 'pegawaicontroller@page_absensi');
Route::get('/dashboard', 'pegawaicontroller@page_absensi')->middleware('checkrole');
//=====> Upload Data .
Route::get('uploaddata/{id}' , 'umumcontroller@page_uploaddata');
Route::get('getData' , 'umumcontroller@page_getDataUID');
Route::get('testcode' , 'umumcontroller@testcom');
//=====> Absensi.
Route::get('absensi', 'pegawaicontroller@page_absensi')->middleware('checkrole');
Route::get('pengajian', 'pegawaicontroller@page_pengajian')->middleware('checkrole');   
Route::post('/cari_data_absensi' , 'pegawaicontroller@page_cari_data_absensi')->middleware('checkrole');
//=====> Pegawai .
Route::get('daftar', 'pegawaicontroller@page_daftar')->middleware('checkrole');
Route::post('/simpanpegawai' , 'pegawaicontroller@page_simpanpegawai')->middleware('checkrole');
Route::get('deletepegawai/{id}' , 'pegawaicontroller@page_deletepegawai')->middleware('checkrole');
Route::get('updatepegawai/{id}' , 'pegawaicontroller@page_updatepegawai')->middleware('checkrole');
Route::post('/updateitempegawai' , 'pegawaicontroller@page_updateitempegawai')->middleware('checkrole');
Route::post('/bacapenggajian' , 'pegawaicontroller@page_bacapenggajian')->middleware('checkrole');
//=====> Potongan .
Route::get('potongan', 'umumcontroller@page_potongan')->middleware('checkrole');
Route::post('/simpanpotongan', 'umumcontroller@page_simpanpotongan')->middleware('checkrole');
Route::get('updatepotongan/{id}', 'umumcontroller@page_updatepotongan')->middleware('checkrole');
Route::post('/updateitempotongan' , 'umumcontroller@page_updateitempotongan')->middleware('checkrole');
Route::get('deletepotongan/{id}', 'umumcontroller@page_hapuspotongan')->middleware('checkrole');
//=====> Jabatan . 
Route::get('jabatan', 'umumcontroller@page_jabatan')->middleware('checkrole');
Route::post('/simpanjabatan', 'umumcontroller@page_simpanjabatan')->middleware('checkrole');
Route::get('updatejabatan/{id}', 'umumcontroller@page_updatejabatan')->middleware('checkrole');
Route::post('/updateitemjabatan' , 'umumcontroller@page_updateitemjabatan')->middleware('checkrole');
Route::get('deletejabatan/{id}', 'umumcontroller@page_hapusjabatan')->middleware('checkrole');
//=====> Tunjangan . 
Route::get('tunjangan', 'umumcontroller@page_tunjangan')->middleware('checkrole');
Route::post('/simpantunjangan' , 'umumcontroller@page_simpantunjangan')->middleware('checkrole');
Route::get('updatetunjangan' , 'umumcontroller@page_updateitemtunjangan')->middleware('checkrole');
Route::get('deletetunjangan/{id}', 'umumcontroller@page_deletetunjangan')->middleware('checkrole');
Route::get('updatetunjangan/{id}', 'umumcontroller@page_updatetunjangan')->middleware('checkrole');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('checkrole');
// });

Route::get('/daftar-pegawai', 'PenggajianCont@index')->middleware('checkrole');
Route::get('/data-daftar-pegawai', 'PenggajianCont@data_pegawai')->name('data_pegawai');
Route::get('/detail-gaji/{id_pegawai}','PenggajianCont@detail_gaji');
Route::get('/detail-gaji-pegawai/{id_pegawai}','PenggajianCont@detail_gaji_pegawai');
Route::get('/cok/{id_pegawai}','PenggajianCont@detail_gaji_pegawai2');

Route::get('/total-jam-kerja/{pegawai_id}','PenggajianCont@total_jam_kerja');
Route::get('/total-jam-lembur/{pegawai_id}','PenggajianCont@total_jam_lembur');
Route::get('/total-potongan/{pegawai_id}','PenggajianCont@total_potongan');
Route::get('/total-gajibersih/{pegawai_id}','PenggajianCont@total_gajibersih');
Route::get('/total-tunjangan/{pegawai_id}','PenggajianCont@total_tunjangan');
Route::get('/total-tunjangan2/{pegawai_id}','PenggajianCont@total_tunjangan2');

Route::get('/total-jam-kerja2/{pegawai_id}','PenggajianCont@total_jam_kerja2');
Route::get('/total-jam-lembur2/{pegawai_id}','PenggajianCont@total_jam_lembur2');
Route::get('/total-potongan2/{pegawai_id}','PenggajianCont@total_potongan2');
Route::get('/total-gajibersih2/{pegawai_id}','PenggajianCont@total_gajibersih2');

Route::get('/cetak-slip','PenggajianCont@print')->name('print');

// NEW TEMPLATE
Route::get('/admin-dashboard', [DashboardAdmin::class,'page_dashboard'])->name('page_dashboard');

Route::get('/admin-jabatan',[JabatanAdmin::class,'page_jabatan'])->name('page.jabatan');
Route::post('/admin-jabatan-post',[JabatanAdmin::class,'post_jabatan'])->name('post.jabatan');

Route::get('/admin-tunjangan',[TunjanganAdmin::class,'page_tunjangan'])->name('page.tunjangan');
Route::post('/admin-tunjangan-post',[TunjanganAdmin::Class,'post_tunjangan'])->name('post.tunjangan');

Route::get('/admin-pegawai',[PegawaiAdmin::class,'page_pegawai'])->name('page.pegawai');