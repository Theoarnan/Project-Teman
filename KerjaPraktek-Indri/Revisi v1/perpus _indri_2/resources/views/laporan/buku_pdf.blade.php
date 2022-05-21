<!DOCTYPE html>
<html>

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css">
    .center {
      text-align: center;
    }
  </style>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title>Laporan Data Buku</title>
</head>

<body>
  <h4 class="center">SI PERPUS</h4>
  <h1 class="center">= LAPORAN DATA BUKU =</h1><br>
  <p class="text-left text-capitalize">Jenis Cetak : {{$status}}</p>
  <p class="text-left">Tanggal Cetak : {{date('Y-m-d')}}</p>
  <table class="table table-striped text-center" id="pseudo-demo">
    <thead class="text-black">
      <tr>
        <th>Judul</th>
        <th>ISBN</th>
        <th>Pengarang</th>
        <th>Tahun</th>
        <th>Stok</th>
        <th>Kategori</th>
      </tr>
    </thead>
    <tbody>
      @foreach($datas as $data)
      <tr>
        <td>
          {{$data->judul}}
        </td>
        <td>{{$data->isbn}}</td>
        <td>{{$data->pengarang}}</td>
        <td>{{$data->tahun_terbit}}</td>
        <td>{{$data->jumlah_buku}}</td>
        <td>{{$data->kategori->nama_kategori_buku}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>