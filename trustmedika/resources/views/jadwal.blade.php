@extends('layouts.navbar')

@section('nav_jadwal', 'active')
@section('content')
  <div class="mt-5">
    @if(session()->has('success'))
      <div class="alert alert-primary mb-2" role="alert">
        {{ session('success') }}
      </div>
    @elseif ($errors->any() || session()->has('error'))
      <div class="alert alert-danger mb-2" role="alert">
        Mohon maaf permintaan anda gagal diproses!
      </div>
    @endif
    <button class="btn btn-primary me-2" type="button" data-bs-toggle="collapse" data-bs-target="#tambahCollapse" aria-expanded="false" aria-controls="tambahCollapse">Tambah / Ubah Data Jadwal</button>
    <button class="btn btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#hapusCollapse" aria-expanded="false" aria-controls="hapusCollapse">Hapus Data Jadwal</button>
    <a class="btn btn-success float-end" href="/jadwal/download" role="button">Unduh Jadwal</a>
  </div>
  <div class="collapse" id="tambahCollapse">
    <div class="card mx-auto mt-2">
      <div class="card-body">
        <form class="pt-2 ps-2 pe-2" action="/jadwal/add" method="POST">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Poli / Klinik</label>
            <select class="form-select" aria-label="Default select example" name="jadwal_poli_kode">
              @foreach($poli as $option_poli)
                <option value="{{ $option_poli->poli_kode }}">{{ $option_poli->poli_nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Nama Pegawai</label>
            <select class="form-select" aria-label="Default select example" name="jadwal_pegawai_nomor">
              @foreach($pegawai as $option_pegawai)
                <option value="{{ $option_pegawai->pegawai_nomor }}">{{ $option_pegawai->pegawai_nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Hari</label>
            <select class="form-select" aria-label="Default select example" name="jadwal_hari">
              <option selected value="jadwal_senin">Senin</option>
              <option value="jadwal_selasa">Selasa</option>
              <option value="jadwal_rabu">Rabu</option>
              <option value="jadwal_kamis">Kamis</option>
              <option value="jadwal_jumat">Jumat</option>
              <option value="jadwal_sabtu">Sabtu</option>
              <option value="jadwal_minggu">Minggu</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput4" class="form-label">Waktu Mulai</label>
              <input type="time" class="form-control form-control-time" name="jadwal_mulai" required>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput5" class="form-label">Waktu Akhir</label>
              <input type="time" class="form-control form-control-time" name="jadwal_akhir" required>
          </div>
          <button type="submit" class="btn btn-primary mb-3">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
  <div class="collapse" id="hapusCollapse">
    <div class="card mx-auto mt-2">
      <div class="card-body">
        <form class="pt-2 ps-2 pe-2" action="/jadwal/delete" method="POST">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Poli / Klinik</label>
            <select class="form-select" aria-label="Default select example" name="jadwal_poli_kode">
              @foreach($poli as $option_poli)
                <option value="{{ $option_poli->poli_kode }}">{{ $option_poli->poli_nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Nama Pegawai</label>
            <select class="form-select" aria-label="Default select example" name="jadwal_pegawai_nomor">
              @foreach($pegawai as $option_pegawai)
                <option value="{{ $option_pegawai->pegawai_nomor }}">{{ $option_pegawai->pegawai_nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Hari</label>
            <select class="form-select" aria-label="Default select example" name="jadwal_hari">
              <option selected value="jadwal_senin">Senin</option>
              <option value="jadwal_selasa">Selasa</option>
              <option value="jadwal_rabu">Rabu</option>
              <option value="jadwal_kamis">Kamis</option>
              <option value="jadwal_jumat">Jumat</option>
              <option value="jadwal_sabtu">Sabtu</option>
              <option value="jadwal_minggu">Minggu</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput4" class="form-label">Waktu Mulai</label>
              <input type="time" class="form-control form-control-time" name="jadwal_mulai" required>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput5" class="form-label">Waktu Akhir</label>
              <input type="time" class="form-control form-control-time" name="jadwal_akhir" required>
          </div>
          <button type="submit" class="btn btn-danger mb-3">Hapus Data</button>
        </form>
      </div>
    </div>
  </div>
  <div class="card mx-auto mt-2">
    <div class="card-body">
      <table class="table">
        <thead class="text-center table-primary">
          <tr class="table-group-divider">
            <th colspan="9">DATA JADWAL DOKTER RS TRUSMEDIKA SURABAYA</th>
          </tr>
          <tr class="table-group-divider">
            <th scope="col">No</th>
            <th scope="col">Poli / Klinik</th>
            <th scope="col">Senin</th>
            <th scope="col">Selasa</th>
            <th scope="col">Rabu</th>
            <th scope="col">Kamis</th>
            <th scope="col">Jumat</th>
            <th scope="col">Sabtu</th>
            <th scope="col">Minggu</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          @foreach($poli as $list_poli)
            <tr class="table-info">
              <th scope="row">{{ $loop->iteration }}</th>
              <th colspan="8">{{ $list_poli->poli_nama }}</th>
            </tr>
            @foreach($jadwal as $day)
              @if($day->jadwal_poli_kode == $list_poli->poli_kode)
                <tr>
                  <th scope="row"></th>
                  <td>{{ $day->pegawai_nama }}</td>
                  <td class="text-center">
                    {{ $day->jadwal_senin }}
                  </td>
                  <td class="text-center">
                    {{ $day->jadwal_selasa }}
                  </td>
                  <td class="text-center">
                    {{ $day->jadwal_rabu }}
                  </td>
                  <td class="text-center">
                    {{ $day->jadwal_kamis }}
                  </td>
                  <td class="text-center">
                    {{ $day->jadwal_jumat }}
                  </td>
                  <td class="text-center">
                    {{ $day->jadwal_sabtu }}
                  </td>
                  <td class="text-center">
                    {{ $day->jadwal_minggu }}
                  </td>
                </tr>
              @endif
            @endforeach
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection