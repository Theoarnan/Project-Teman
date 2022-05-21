@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

  });
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12">
    @if (Session::has('message'))
    <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">
      {{ Session::get('message') }}
    </div>
    @endif
  </div>
</div>
<div class="row" style="margin-top: 20px;">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">DATA DOSEN</h4>
      </div>
      <div class="card-body">
        <div class="col-lg-2">
          <a href="{{ route('dosen.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah
            Dosen</a>
        </div><br>
        <div class="table-responsive">
          <table class="table table-striped" id="table">
            <thead>
              <tr>
                <th>
                  Nama
                </th>
                <th>
                  NIDN
                </th>
                <th>
                  TTL
                </th>
                <th>
                  Jenis Kelamin
                </th>
                <th>
                  Program Studi
                </th>
                <th>
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($datas as $data)
              <tr>
                <td>
                  {{$data->nama}}
                </td>
                <td>
                  <a href="{{route('dosen.show', $data->id)}}">
                    {{$data->nidn}}
                  </a>
                </td>
                <td>
                  {{$data->tempat_lahir}}
                </td>

                <td>
                  {{$data->jk === "L" ? "Laki - Laki" : "Perempuan"}}
                </td>
                <td>
                  {{$data->prodi}}
                </td>
                <td>
                  <div class="btn-group dropdown">
                    <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Action
                    </button>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                      <a class="dropdown-item" href="{{route('dosen.edit', $data->id)}}"> Edit </a>
                      <form action="{{ route('dosen.destroy', $data->id) }}" class="pull-left" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                          Delete
                        </button>
                      </form>

                    </div>
                  </div>
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
@endsection