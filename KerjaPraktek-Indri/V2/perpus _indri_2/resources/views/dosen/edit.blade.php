@section('js')

<script type="text/javascript">
    $(document).ready(function () {
        $(".users").select2();
    });
</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('dosen.update', $data->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Dosen</h4>

                            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label for="nama" class="col-md-4 control-label">Nama</label>
                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama"
                                        value="{{ $data->nama }}" required>
                                    @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('nidn') ? ' has-error' : '' }}">
                                <label for="nidn" class="col-md-4 control-label">NIDN</label>
                                <div class="col-md-6">
                                    <input id="nidn" type="number" class="form-control" name="nidn"
                                        value="{{ $data->nidn }}" maxlength="8" required>
                                    @if ($errors->has('nidn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nidn') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                                <label for="tempat_lahir" class="col-md-4 control-label">Tempat Lahir</label>
                                <div class="col-md-6">
                                    <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir"
                                        value="{{ $data->tempat_lahir }}" required>
                                    @if ($errors->has('tempat_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                                <label for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir</label>
                                <div class="col-md-6">
                                    <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir"
                                        value="{{ $data->tgl_lahir }}" required>
                                    @if ($errors->has('tgl_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                <label for="level" class="col-md-4 control-label">Jenis Kelamin</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="jk" required="">
                                        <option value=""></option>
                                        <option value="L" {{$data->jk === "L" ? "selected" : ""}}>Laki - Laki</option>
                                        <option value="P" {{$data->jk === "P" ? "selected" : ""}}>Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                <label for="level" class="col-md-4 control-label">Program Studi</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="ps" required="">
                                        <option value=""></option>
                                        <option value="I" {{$data->ps === "I" ? "selected" : ""}}>Informatika</option>
                                        <option value="T" {{$data->ps === "T" ? "selected" : ""}}>Teknik Sipil</option>
                                        <option value="F" {{$data->ps === "F" ? "selected" : ""}}>Fisika</option>
                                        <option value="M" {{$data->ps === "M" ? "selected" : ""}}>Manajemen</option>
                                        <option value="A" {{$data->ps === "A" ? "selected" : ""}}>Akuntansi</option>
                                        <option value="P" {{$data->ps === "P" ? "selected" : ""}}>Pendidikan Agama Kristen</option>
                                        <option value="MG" {{$data->ps === "MG" ? "selected" : ""}}>Musik Gereja</option>
                                        <option value="TH" {{$data->ps === "TH" ? "selected" : ""}}>Theologia Konseling Kristen</option>
                                    </select>
                                </div>
                            </div>
                 
                            <button type="submit" class="btn btn-primary" id="submit">
                                Ubah
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                            <a href="{{route('dosen.index')}}" class="btn btn-light pull-right">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection