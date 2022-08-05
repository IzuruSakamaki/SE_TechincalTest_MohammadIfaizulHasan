<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Master_Jadwal;
use App\Models\Master_Poli;
use App\Models\Master_Pegawai;
use PDF;


class JadwalController extends Controller
{
  public function show() {
    return view('jadwal', [
      'poli' => Master_Poli::all(),
      'pegawai' => Master_Pegawai::all(),
      'jadwal' => Master_Jadwal::join('master_poli', 'master_poli.poli_kode', '=', 'master_jadwal.jadwal_poli_kode')
        ->join('master_pegawai', 'master_pegawai.pegawai_nomor', 'master_jadwal.jadwal_pegawai_nomor')
        ->get(['master_jadwal.*', 'master_poli.poli_nama as poli_nama', 'master_pegawai.pegawai_nama as pegawai_nama']),
    ]);
  }
  public function add(Request $request) {
    $request->validate([
      'jadwal_poli_kode' => 'required',
      'jadwal_pegawai_nomor' => 'required',
      'jadwal_hari' => 'required',
      'jadwal_mulai' => 'required',
      'jadwal_akhir' => 'required'
    ]);
    $exist_data = Master_Jadwal::where(
      [
        'jadwal_poli_kode' => $request->input('jadwal_poli_kode'),
        'jadwal_pegawai_nomor' => $request->input('jadwal_pegawai_nomor')
      ]);
    if(is_null($exist_data->first())) {
      Master_Jadwal::create([
        'jadwal_poli_kode' => $request->input('jadwal_poli_kode'),
        'jadwal_pegawai_nomor' => $request->input('jadwal_pegawai_nomor'),
        $request->input('jadwal_hari') => $request->input('jadwal_mulai').' - '.$request->input('jadwal_akhir')
      ]);
      return redirect('/jadwal')->with('success', 'Jadwal baru telah ditambahkan!');
    }
    else if($exist_data->first()){
      $exist_data->update([
        $request->input('jadwal_hari') => $request->input('jadwal_mulai').' - '.$request->input('jadwal_akhir')
      ]);
      return redirect('/jadwal')->with('success', 'Jadwal baru telah ditambahkan!');
    }
  }
  public function delete(Request $request) {
    $request->validate([
      'jadwal_poli_kode' => 'required',
      'jadwal_pegawai_nomor' => 'required',
      'jadwal_hari' => 'required',
      'jadwal_mulai' => 'required',
      'jadwal_akhir' => 'required'
    ]);
    $exist_data = Master_Jadwal::where(
      [
        'jadwal_poli_kode' => $request->input('jadwal_poli_kode'),
        'jadwal_pegawai_nomor' => $request->input('jadwal_pegawai_nomor'),
        $request->input('jadwal_hari') => $request->input('jadwal_mulai').' - '.$request->input('jadwal_akhir'),
      ]);
    if($exist_data->first()) {
      $exist_data->update([
        $request->input('jadwal_hari') => null
      ]);
      if(is_null($exist_data->first())) {
        Master_Jadwal::where([
          'jadwal_poli_kode' => $request->input('jadwal_poli_kode'),
          'jadwal_pegawai_nomor' => $request->input('jadwal_pegawai_nomor'),
        ])->delete();
      }
      return redirect('/jadwal')->with('success', 'Jadwal berhasil dihapus!');
    }
    else {
      return redirect('/jadwal')->with('error', '404');
    }
  }

  public function download(Request $request) {
    return PDF::loadView('temp', [
      'poli' => Master_Poli::all(),
      'pegawai' => Master_Pegawai::all(),
      'jadwal' => Master_Jadwal::join('master_poli', 'master_poli.poli_kode', '=', 'master_jadwal.jadwal_poli_kode')
        ->join('master_pegawai', 'master_pegawai.pegawai_nomor', 'master_jadwal.jadwal_pegawai_nomor')
        ->get(['master_jadwal.*', 'master_poli.poli_nama as poli_nama', 'master_pegawai.pegawai_nama as pegawai_nama']),
    ])->setPaper('a4', 'landscape')->download('jadwal.pdf');
  }
}