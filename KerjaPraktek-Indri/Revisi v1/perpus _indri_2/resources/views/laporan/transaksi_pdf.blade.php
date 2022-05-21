<!DOCTYPE html>
<html>

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css">
    /* img {
      width: 40px;
      height: 40px;
      border-radius: 100%;
    } */

    .center {
      text-align: center;
    }

    .badge {
      display: inline-block;
      padding: 0.25em 0.4em;
      font-size: 75%;
      font-weight: 700;
      line-height: 1;
      text-align: center;
      white-space: nowrap;
      vertical-align: baseline;
      border-radius: 0.25rem;
    }

    .badge-warning {
      color: #212529;
      background-color: #ffaf00;
    }

    .badge-warning[href]:hover,
    .preview-list .preview-item .preview-thumbnail [href].badge.badge-busy:hover,
    .badge-warning[href]:focus,
    .preview-list .preview-item .preview-thumbnail [href].badge.badge-busy:focus {
      color: #212529;
      text-decoration: none;
      background-color: #cc8c00;
    }

    .badge-success,
    .preview-list .preview-item .preview-thumbnail .badge.badge-online {
      color: #fff;
      background-color: #00ce68;
    }

    .badge-success[href]:hover,
    .preview-list .preview-item .preview-thumbnail [href].badge.badge-online:hover,
    .badge-success[href]:focus,
    .preview-list .preview-item .preview-thumbnail [href].badge.badge-online:focus {
      color: #fff;
      text-decoration: none;
      background-color: #009b4e;
    }
  </style>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title>Laporan Data Transaksi</title>
</head>

<body>
  <h4 class="center">SI PERPUS</h4>
  <h1 class="center">= LAPORAN DATA TRANSAKSI =</h1><br>
  <p class="text-left text-capitalize">Jenis Cetak : {{$status}}</p>
  <p class="text-left">Tanggal Cetak : {{date('Y-m-d')}}</p>
  <table class="table table-striped text-center" id="pseudo-demo">
    <thead>
      <tr>
        <th>
          Kode
        </th>
        <th>
          Peminjam
        </th>
        <th>
          Tgl Pinjam
        </th>
        <th>
          Tgl Kembali
        </th>
        <th>
          Tgl Dikembalikan
        </th>
        <th>
          Status
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach($datas as $data)
      <tr>
        <td class="py-1">
          {{$data->kode_transaksi}}
        </td>
        <td>
          @if($data->mahasiswa_id == '')
          {{$data->dosen->nama}}
          @else
          {{$data->mahasiswa->nama}}
          @endif
        </td>
        <td>
          {{date('d/m/y', strtotime($data->tgl_pinjam))}}
        </td>
        <td>
          {{date('d/m/y', strtotime($data->tgl_kembali))}}
        </td>
        <td>
          @if($data->status == 'kembali')
          {{date('d/m/y', strtotime($data->tgl_pengembalian))}}
          @else
          ---- -- --
          @endif
        </td>
        <td>
          @if($data->status == 'pinjam')
          <label class="badge badge-warning">Pinjam</label>
          @else
          <label class="badge badge-success">Kembali</label>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>