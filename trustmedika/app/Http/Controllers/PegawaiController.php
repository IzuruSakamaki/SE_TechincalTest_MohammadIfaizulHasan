<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Master_Pegawai;



class PegawaiController extends Controller
{
  public function show() {
    return view('pegawai', [
      'pegawai' => Master_Pegawai::all()
    ]);
  }
  public function add(Request $request) {
    Master_Pegawai::create($request->validate([
      'pegawai_nomor' => 'required|unique:master_pegawai',
      'pegawai_nama' => 'required'
    ]));
    return redirect('/pegawai')->with('success', 'Pegawai baru telah ditambahkan!');
  }
  public function edit(Request $request) {
    $edit_data = Master_Pegawai::where('pegawai_nomor', $request->validate([
      'pegawai_nomor' => 'required'
    ]));
    if(is_null($edit_data->first())) {
      return redirect('/pegawai')->with('error', '404');
    }
    $edit_data->update($request->validate([
      'pegawai_nama' => 'required'
    ]));
    return redirect('/pegawai')->with('success', 'Data pegawai telah diubah!');
  }
  public function delete(Request $request) {
    $delete_data = Master_Pegawai::where('pegawai_nomor', $request->validate([
      'pegawai_nomor' => 'required',
    ]));
    if(is_null($delete_data->first())) {
      return redirect('/pegawai')->with('error', '404');
    }
    $delete_data->delete();
    return redirect('/pegawai')->with('success', 'Pegawai baru telah dihapus!');
  }
}