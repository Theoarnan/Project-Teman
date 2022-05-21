@section('js')
<script type="text/javascript">
  $(document).on('click', '.pilih', function(e) {
    document.getElementById("buku_judul").value = $(this).attr('data-buku_judul');
    document.getElementById("buku_id").value = $(this).attr('data-buku_id');
    // $('#myModal').modal('hide');
    $('#myModal').modal().hide();
  });

  $(document).on('click', '.pilih_anggota', function(e) {
    document.getElementById("mahasiswa_id").value = $(this).attr('data-mahasiswa_id');
    document.getElementById("anggota_nama").value = $(this).attr('data-anggota_nama');
    console.log(document.getElementById("mahasiswa_id").value)
    $('#myModal2').modal('hide');
  });
  $(document).on('click', '.pilih_anggota2', function(e) {
    document.getElementById("dosen_id").value = $(this).attr('data-mahasiswa_id');
    document.getElementById("anggota_nama").value = $(this).attr('data-anggota_nama');
    console.log(document.getElementById("dosen_id").value)
    $('#myModal2').modal('hide');
  });

  // Tambah Buku
  $(document).on('click', '#addcart', function() {
    var id = $(this).data('idbuku')
    var isbn = $(this).data('isbn')
    var url = $(this).data('url')
    var token = $(this).data('token')
    $.ajax({
      type: 'POST',
      url: url,
      dataType: 'JSON',
      data: {
        '_method': 'POST',
        '_token': token,
        'id': id,
        'qty': 1,
        'isbn': isbn
      },
      success: function(response) {
        if (response.data == "sukses") {
          location.reload();
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Gagal Hapus Data Keranjang!',
          });
        }
      }
    })
  });

  // Hapus Keranjang
  $(document).on('click', '#hapus-item-cart', function() {
    var id = $(this).data('cartid')
    var id_buku = $(this).data('bukuid')
    var url = $(this).data('url')
    var token = $(this).data('token')
    // console.log(id, url, token);
    $.ajax({
      type: 'DELETE',
      url: url,
      dataType: 'JSON',
      data: {
        '_method': 'POST',
        '_token': token,
        'id_cart': id,
        'id_buku': id_buku
      },
      success: function(response) {
        if (response.data == "sukses") {
          location.reload();
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Gagal Hapus Data Keranjang!',
          });
        }
      }
    })
  });

  // Proses Submit
  $(function() {
    $("#lookup, #lookup2").dataTable();
  });
</script>
<script>
  // Pilih Jenis
  $('.lookup-dosen').hide();
  $('.lookup-mahasiswa').hide();
  $(document).ready(function(e) {
    $('.pilih-jenis').change(function() {
      if ($(this).val() == "Mahasiswa") {
        // console.log('Mahasiswa')
        $('.lookup-dosen').hide();
        $('.lookup-mahasiswa').show();
      } else if ($(this).val() === "Dosen") {
        // console.log('Dosen')
        $('.lookup-mahasiswa').hide();
        $('.lookup-dosen').show();
      } else {
        $('.lookup-mahasiswa').hide();
        $('.lookup-dosen').hide();
      }
    })
  })
</script>


@stop
@section('css')

@stop
@extends('layouts.app')

@section('content')

<!-- <form method="POST" action="{{ route('transaksi.store') }}" enctype="multipart/form-data"> -->
{{ csrf_field() }}
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      <div class="col-12">
        <h4 class="card-title">APLIKASI PEMINJAMAN</h4>
        <div class="row">
          <div class="col-md-7">
            <div class="card">
              <div class="card-body">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Buku</a>
                <p>&nbsp;</p>
                <input type="hidden" id="qty_keranjangs">
                <table id="myTable" class="table">
                  <thead>
                    <tr>
                      <th>ISBN</th>
                      <th>Judul Buku</th>
                      <th>Kategori Buku</th>
                      <th>Qty</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="table_keranjang">
                    @include('transaksi.cart')
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" style="text-align: center;"><b>TRANSAKSI</b></h4>
                <form method="POST" action="{{ route('transaksi.store') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group{{ $errors->has('kode_transaksi') ? ' has-error' : '' }}">
                    <label for="kode_transaksi" class="col-md-6 control-label">Kode Transaksi</label>
                    <div class="col-md-12">
                      <input id="kode_transaksi" type="text" class="form-control" name="kode_transaksi" value="{{ $kode }}" required readonly="">
                      @if ($errors->has('kode_transaksi'))
                      <span class="help-block">
                        <strong>{{ $errors->first('kode_transaksi') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
                    <label for="tgl_pinjam" class="col-md-4 control-label">Tanggal Pinjam</label>
                    <div class="col-md-12">
                      <input id="tgl_pinjam" type="date" class="form-control" name="tgl_pinjam" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required readonly @if(Auth::user()->level == 'user') @endif>
                      @if ($errors->has('tgl_pinjam'))
                      <span class="help-block">
                        <strong>{{ $errors->first('tgl_pinjam') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('tgl_kembali') ? ' has-error' : '' }}">
                    <label for="tgl_kembali" class="col-md-4 control-label">Tanggal Kembali</label>
                    <div class="col-md-12">
                      <input id="tgl_kembali" type="date" class="form-control" name="tgl_kembali" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->addDays(7)->toDateString())) }}" required="" @if(Auth::user()->level == 'user') readonly @endif>
                      @if ($errors->has('tgl_kembali'))
                      <span class="help-block">
                        <strong>{{ $errors->first('tgl_kembali') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  @if(Auth::user()->level == 'admin')
                  <div class="form-group{{ $errors->has('mahasiswa_id') ? ' has-error' : '' }}">
                    <label for="mahasiswa_id" class="col-md-4 control-label">Cari Peminjam</label>
                    <div class="col-md-12">
                      <div class="input-group">
                        <input id="anggota_nama" type="text" class="form-control" name="anggota_nama" value="" style="min-width: 8em;" readonly="" required>
                        <input id="mahasiswa_id" type="hidden" name="mahasiswa_id" value="" required readonly="">
                        <input id="dosen_id" type="hidden" name="dosen_id" value="" required readonly="">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Peminjam</b> <span class="fa fa-search"></span></button>
                        </span>
                      </div>
                      @if ($errors->has('mahasiswa_id'))
                      <span class="help-block">
                        <strong>{{ $errors->first('mahasiswa_id') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  @else
                  <div class="form-group{{ $errors->has('mahasiswa_id') ? ' has-error' : '' }}">
                    <label for="mahasiswa_id" class="col-md-4 control-label">Mahasiswa</label>
                    <div class="col-md-12">
                      <input id="anggota_nama" type="text" class="form-control" readonly="" value="{{Auth::user()->anggota->nama}}" required>
                      <input id="mahasiswa_id" type="hidden" name="mahasiswa_id" value="{{ Auth::user()->anggota->id }}" required readonly="">

                      @if ($errors->has('mahasiswa_id'))
                      <span class="help-block">
                        <strong>{{ $errors->first('mahasiswa_id') }}</strong>
                      </span>
                      @endif

                    </div>
                  </div>
                  @endif
                  <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                    <label for="ket" class="col-md-4 control-label">Keterangan</label>
                    <div class="col-md-12">
                      <textarea id="ket" rows="5" type="text" class="form-control" name="ket" value="{{ old('ket') }}"></textarea>
                      @if ($errors->has('ket'))
                      <span class="help-block">
                        <strong>{{ $errors->first('ket') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="form-control" style="text-align: center;">
                    <button type="submit" class="btn btn-success" id="submit">
                      Proses Transaksi
                    </button>
                    <button type="reset" class="btn btn-danger">
                      Reset
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- </form> -->

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="lookup" class="table table-bordered table-hover table-striped">
          <thead>
            <tr>
              <th>Judul</th>
              <th>ISBN</th>
              <th>Pengarang</th>
              <th>Tahun</th>
              <th>Stok</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($bukus as $data)
            <tr class="pilih" data-buku_id="<?php echo $data->id; ?>" data-buku_judul="<?php echo $data->judul; ?>">
              <td>@if($data->cover)
                <img src="{{url('images/buku/'. $data->cover)}}" alt="image" style="margin-right: 10px;" />
                @else
                <img src="{{url('images/buku/default.png')}}" alt="image" style="margin-right: 10px;" />
                @endif
                {{$data->judul}}
              </td>
              <td>{{$data->isbn}}</td>
              <td>{{$data->pengarang}}</td>
              <td>{{$data->tahun_terbit}}</td>
              <td>{{$data->jumlah_buku}}</td>
              <td><a href="#" id="addcart" data-idbuku="{{$data->id}}" data-isbn="{{$data->isbn}}" data-url="{{ route('cart.store', $data->id)}}" data-token="{{@csrf_token()}}" class="btn btn-success">Pilih</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5>Cari Peminjam Buku</h5>
      </div>
      <div class="modal-header">
        <div class="col-md-12">
          <select class="form-control pilih-jenis" id="pilih-jenis" name="pilih-jenis" required>
            <option value="">Pilih Type Peminjam</option>
            <option value="Dosen">Dosen</option>
            <option value="Mahasiswa">Mahasiswa</option>
          </select>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body lookup-mahasiswa">
        <table id="lookup2" name="lookup2" class="table table-bordered table-hover table-striped">
          <thead>
            <tr>
              <th>
                Nama
              </th>
              <th>
                NIM
              </th>
              <th>
                Prodi
              </th>
              <th>
                Jenis Kelamin
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($mahasiswas as $data)
            <tr class="pilih_anggota" data-mahasiswa_id="<?php echo $data->id; ?>" data-anggota_nama="<?php echo $data->nama; ?>">
              <td class="py-1">
                @if($data->user->gambar)
                <img src="{{url('images/user', $data->user->gambar)}}" alt="image" style="margin-right: 10px;" />
                @else
                <img src="{{url('images/user/default.png')}}" alt="image" style="margin-right: 10px;" />
                @endif

                {{$data->nama}}
              </td>
              <td>
                {{$data->nim}}
              </td>

              <td>
                @if($data->prodi == 'TI')
                Teknik Informatika
                @elseif($data->prodi == 'SI')
                Sistem Informasi
                @else
                Kesehatan Masyarakat
                @endif
              </td>
              <td>
                {{$data->jk === "L" ? "Laki - Laki" : "Perempuan"}}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-body lookup-dosen">
        <table id="lookup2" name="lookup2" class="table table-bordered table-hover table-striped text-center">
          <thead>
            <tr>
              <th>
                Nama
              </th>
              <th>
                NIDN
              </th>
              <th>
                Jenis Kelamin
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($dosens as $data)
            <tr class="pilih_anggota2" data-mahasiswa_id="<?php echo $data->id; ?>" data-anggota_nama="<?php echo $data->nama; ?>">
              <td class="py-1">
                {{$data->nama}}
              </td>
              <td>
                {{$data->id}}
              </td>
              <td>
                {{$data->jk === "L" ? "Laki - Laki" : "Perempuan"}}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection