@section('js')
 <script type="text/javascript">
   $(document).on('click', '.pilih', function (e) {
                document.getElementById("buku_judul").value = $(this).attr('data-buku_judul');
                document.getElementById("buku_id").value = $(this).attr('data-buku_id');
                $('#myModal').modal('hide');
            });

            $(document).on('click', '.pilih_anggota', function (e) {
                document.getElementById("mahasiswa_id").value = $(this).attr('data-mahasiswa_id');
                document.getElementById("anggota_nama").value = $(this).attr('data-anggota_nama');
                $('#myModal2').modal('hide');
            });
          
             $(function () {
                $("#lookup, #lookup2").dataTable();
            });

        </script>

@stop
@section('css')

@stop
@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('transaksi.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">

                    <div class="row">

                        <div class="col-7">
                        <h4 class="card-title">Tambah Transaksi baru</h4>
                    
                    <div class="form-group{{ $errors->has('kode_transaksi') ? ' has-error' : '' }}">
                        <label for="kode_transaksi" class="col-md-4 control-label">Kode Transaksi</label>
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
                        <div class="col-md-6">
                            <input id="tgl_pinjam" type="date" class="form-control" name="tgl_pinjam" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required @if(Auth::user()->level == 'user') readonly @endif>
                            @if ($errors->has('tgl_pinjam'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tgl_pinjam') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                     <div class="form-group{{ $errors->has('tgl_kembali') ? ' has-error' : '' }}">
                        <label for="tgl_kembali" class="col-md-4 control-label">Tanggal Kembali</label>
                        <div class="col-md-5">
                            <input id="tgl_kembali" type="date"  class="form-control" name="tgl_kembali" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->addDays(5)->toDateString())) }}" required="" @if(Auth::user()->level == 'user') readonly @endif>
                            @if ($errors->has('tgl_kembali'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tgl_kembali') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    
                    

                    @if(Auth::user()->level == 'admin')
                    <div class="form-group{{ $errors->has('mahasiswa_id') ? ' has-error' : '' }}">
                        <label for="mahasiswa_id" class="col-md-4 control-label">Mahasiswa</label>
                        <div class="col-md-12">
                            <div class="input-group">
                            <input id="anggota_nama" type="text" class="form-control" style="min-width: 8em;" readonly="" required>
                            <input id="mahasiswa_id" type="hidden" name="mahasiswa_id" value="{{ old('mahasiswa_id') }}" required readonly="">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-warning btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Mahasiswa</b> <span class="fa fa-search"></span></button>
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
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <input id="ket" type="text" class="form-control" name="ket" value="{{ old('ket') }}">
                            @if ($errors->has('ket'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ket') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                        </div>

                        <div class="col-5">
                          <a href="#" data-toggle="modal" data-target="#myModal">Tambah Buku</a>
                          <p>&nbsp;</p>

                          <table id="myTable" class="table">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Judul Buku</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                          </table>

                        </div>

                        </div>
                        
                       <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('transaksi.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>


  <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bukus as $data)
                                <tr class="pilih" data-buku_id="<?php echo $data->id; ?>" data-buku_judul="<?php echo $data->judul; ?>" >
                                    <td>@if($data->cover)
                            <img src="{{url('images/buku/'. $data->cover)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img src="{{url('images/buku/default.png')}}" alt="image" style="margin-right: 10px;" />
                          @endif
                          {{$data->judul}}</td>
                                    <td>{{$data->isbn}}</td>
                                    <td>{{$data->pengarang}}</td>
                                    <td>{{$data->tahun_terbit}}</td>
                                    <td>{{$data->jumlah_buku}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>


  <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                        <tr>
                          <th>
                            Nama
                          </th>
                          <th>
                            NPM
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
                                <tr class="pilih_anggota" data-mahasiswa_id="<?php echo $data->id; ?>" data-anggota_nama="<?php echo $data->nama; ?>" >
                                    <td class="py-1">
                          @if($data->user->gambar)
                            <img src="{{url('images/user', $data->user->gambar)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img src="{{url('images/user/default.png')}}" alt="image" style="margin-right: 10px;" />
                          @endif

                            {{$data->nama}}
                          </td>
                          <td>
                            {{$data->npm}}
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
                </div>
            </div>
        </div>

@endsection