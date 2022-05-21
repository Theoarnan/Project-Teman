@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table-transaksi').DataTable({
      "iDisplayLength": 50,

    });

  });
</script>

@stop
@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12">
    @if (Session::has('message'))
    <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
    @endif
  </div>
</div>
<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">DATA TRANSAKSI</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="table-transaksi">
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
                  Tgl Hrs Kembali
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
                  <a href="{{route('transaksi.show', $data->id)}}">
                    {{$data->kode_transaksi}}
                  </a>
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
        </div>
        {{-- {!! $datas->links() !!} --}}
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModalDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
              <td><a href="#" id="addcart" data-idbuku="{{$data->id}}" data-url="{{ route('cart.store', $data->id)}}" data-token="{{@csrf_token()}}" class="btn btn-success">Pilih</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection