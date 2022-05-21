@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 d-flex align-items-stretch grid-margin">
        <div class="row flex-grow">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">DETAIL PEMINJAMAN</h4>
                    </div>
                </div>
                <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="kode_transaksi" class="col-md-12 control-label">Nama Peminjam</label>
                                        <div class="col-md-12">
                                            @foreach($mahas as $link)
                                            @if($link->nama != '')
                                            <input id="nama" type="text" class="form-control" name="nama" value="{{$link->nama}}" required readonly="">
                                            @endif
                                            @endforeach
                                            @foreach($doses as $d)
                                            <input id="nama" type="text" class="form-control" name="nama" value="{{$d->nama}}" required readonly="">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="kode_transaksi" class="col-md-12 control-label">Tgl Harus Kembali</label>
                                        <div class="col-md-12">
                                            <input id="tgl-hrs-kembali" type="text" class="form-control" name="tgl-hrs-kembali" value="{{$transaksi->tgl_kembali}}" required readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="kode_transaksi" class="col-md-12 control-label">Denda</label>
                                        <div class="col-md-12">
                                            <input id="denda" type="text" class="form-control" name="denda" value="{{json_encode($denda)}}" required readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="kode_transaksi" class="col-md-12 control-label">Keterlambatan</label>
                                        <div class="col-md-12">
                                            <input id="terlambat" type="text" class="form-control" name="terlambat" value="{{ json_encode($days)}}" required readonly="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($dendas->status == 'pinjam')
                        <div class="card-body text-center">
                            <button class="btn btn-success" onclick="return confirm('Anda yakin data ini sudah kembali?')"><i class="menu-icon mdi mdi-file-document"></i>PROSES KEMBALIKAN BUKU</button>
                        </div>
                        @else
                        <div class="card-body text-center">
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Buku Sudah Dikembalikan!</h4>
                            </div>
                        </div>
                        @endif
                    </div><br>
                </form>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">DATA PINJAM</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Nama Buku
                                        </th>
                                        <th>
                                            Kategori Buku
                                        </th>
                                        <th>
                                            Tgl Pinjam
                                        </th>
                                        <th>
                                            Tgl Kembali
                                        </th>
                                        <th>
                                            Qty
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td class="py-1">
                                            {{$d->judul}}
                                        </td>
                                        <td>
                                            {{$d->nama_kategori_buku}}
                                        </td>
                                        <td>
                                            {{date('d/m/y', strtotime($d->tgl_pinjam))}}
                                        </td>
                                        <td>
                                            {{date('d/m/y', strtotime($d->tgl_kembali))}}
                                        </td>
                                        <td>
                                            {{$d->qty}}
                                        </td>
                                        <td>
                                            @if($d->status == 'pinjam')
                                            <label class="badge badge-warning">Pinjam</label>
                                            @else
                                            <label class="badge badge-success">Kembali</label>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- {!! $datas->links() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection