<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trustmedika</title>
  <style>
    <?php include(public_path().'/css/app.css');?>
    .title-table {
      background-color: #02055A;
      color: white;
      padding: 20px 0px;
    }
    .index-table {
      background-color: #02198B;
      color: white
    }
    .nama_poli {
      background-color: #BDDBF1;
    }
    .text-center {
      padding: 0px 5px;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
  <div class="card mx-auto mt-2">
    <div class="card-body">
      <table class="table">
        <thead class="text-center table-primary">
          <tr class="table-group-divider">
            <th colspan="9" class="title-table">DATA JADWAL DOKTER RS TRUSMEDIKA SURABAYA</th>
          </tr>
          <tr class="table-group-divider">
            <th scope="col" class="index-table">No</th>
            <th scope="col" class="index-table">Poli / Klinik</th>
            <th scope="col" class="index-table">Senin</th>
            <th scope="col" class="index-table">Selasa</th>
            <th scope="col" class="index-table">Rabu</th>
            <th scope="col" class="index-table">Kamis</th>
            <th scope="col" class="index-table">Jumat</th>
            <th scope="col" class="index-table">Sabtu</th>
            <th scope="col" class="index-table">Minggu</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          @foreach($poli as $list_poli)
            <tr class="table-info">
              <th scope="row" class="nama_poli">{{ $loop->iteration }}</th>
              <th colspan="1" class="nama_poli">{{ $list_poli->poli_nama }}</th>
              <th colspan="7" class="nama_poli"></th>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>