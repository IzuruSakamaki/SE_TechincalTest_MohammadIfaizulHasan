<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Master_Poli;



class PoliController extends Controller
{
  public function show() {
    return view('poli', [
      'poli' => Master_Poli::all()
    ]);
  }
  public function add(Request $request) {
    Master_Poli::create($request->validate([
      'poli_kode' => 'required|unique:master_poli',
      'poli_nama' => 'required'
    ]));
    return redirect('/poli')->with('success', 'Poli / Klinik baru telah ditambahkan!');
  }
  public function edit(Request $request) {
    $edit_data = Master_Poli::where('poli_kode', $request->validate([
      'poli_kode' => 'required'
    ]));
    if(is_null($edit_data->first())) {
      return redirect('/poli')->with('error', '404');
    }
    $edit_data->update($request->validate([
      'poli_nama' => 'required'
    ]));
    return redirect('/poli')->with('success', 'Data poli / klinik telah diubah!');
  }
  public function delete(Request $request) {
    $delete_data = Master_Poli::where('poli_kode', $request->validate([
      'poli_kode' => 'required',
    ]));
    if(is_null($delete_data->first())) {
      return redirect('/poli')->with('error', '404');
    }
    $delete_data->delete();
    return redirect('/poli')->with('success', 'Poli / Klinik baru telah dihapus!');
  }
}