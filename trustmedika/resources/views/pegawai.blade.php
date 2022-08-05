@extends('layouts.navbar')

@section('nav_kepegawaian', 'active')
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
    <button class="btn btn-primary me-2" type="button" data-bs-toggle="collapse" data-bs-target="#tambahCollapse" aria-expanded="false" aria-controls="tambahCollapse">Tambah Data Pegawai</button>
    <button class="btn btn-warning me-2" type="button" data-bs-toggle="collapse" data-bs-target="#ubahCollapse" aria-expanded="false" aria-controls="hapusCollapse">Ubah Data Pegawai</button>
    <button class="btn btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#hapusCollapse" aria-expanded="false" aria-controls="hapusCollapse">Hapus Data Pegawai</button>
  </div>
  <div class="collapse" id="tambahCollapse">
    <div class="card mx-auto mt-2">
      <div class="card-body">
        <form class="pt-2 ps-2 pe-2" action="/pegawai/add" method="POST">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nomor Pegawai</label>
            <input type="text" class="form-control" name="pegawai_nomor" placeholder="1A2B3C4D" required>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control" name="pegawai_nama" placeholder="Andre Sugiharto" required>
          </div>
          <button type="submit" class="btn btn-primary mb-3">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
  <div class="collapse" id="ubahCollapse">
    <div class="card mx-auto mt-2">
      <div class="card-body">
        <form class="pt-2 ps-2 pe-2" action="/pegawai/edit" method="POST">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nomor Pegawai</label>
            <input type="text" class="form-control" name="pegawai_nomor" placeholder="1A2B3C4D" required>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Nama Pegawai</label>
            <input type="text" class="form-control" name="pegawai_nama" placeholder="Andre Sugiharto" required>
          </div>
          <button type="submit" class="btn btn-warning mb-3">Ubah Data</button>
        </form>
      </div>
    </div>
  </div>
  <div class="collapse" id="hapusCollapse">
    <div class="card mx-auto mt-2">
      <div class="card-body">
        <form class="pt-2 ps-2 pe-2" action="/pegawai/delete" method="POST">
          <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Nomor Pegawai</label>
            <input type="text" class="form-control" name="pegawai_nomor" placeholder="1A2B3C4D">
          </div>
          <button type="submit" class="btn btn-danger mb-3">Hapus Data</button>
        </form>
      </div>
    </div>
  </div>
  <div class="card mx-auto mt-2">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nomor Identitas</th>
            <th scope="col">Nama Pegawai</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          @foreach($pegawai as $pegawai)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $pegawai->pegawai_nomor }}</td>
              <td>{{ $pegawai->pegawai_nama }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection