@section('js')

<script type="text/javascript">
    $(document).ready(function () {
        $(".users").select2();
    });
</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('mahasiswa.update', $data->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Mahasiswa</h4>

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
                            <div class="form-group{{ $errors->has('nim') ? ' has-error' : '' }}">
                                <label for="nim" class="col-md-4 control-label">NIM</label>
                                <div class="col-md-6">
                                    <input id="nim" type="number" class="form-control" name="nim"
                                        value="{{ $data->nim }}" maxlength="8" required>
                                    @if ($errors->has('nim'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nim') }}</strong>
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

                            <div class="form-group{{ $errors->has('alamat_mahasiswa') ? ' has-error' : '' }}">
                                <label for="alamat_mahasiswa" class="col-md-4 control-label">Alamat Mahasiswa</label>
                                <div class="col-md-6">
                                    <input id="alamat_mahasiswa" type="text" class="form-control" name="alamat_mahasiswa"
                                        value="{{ old('alamat_mahasiswa') }}" required>
                                    @if ($errors->has('alamat_mahasiswa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat_mahasiswa') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $data->email }}" required readonly="">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            <div class="form-group{{ $errors->has('prodi') ? ' has-error' : '' }}">
                                <label for="prodi" class="col-md-4 control-label">Prodi</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="prodi" required="">
                                        <option value=""></option>
                                        <option value="TI" {{$data->prodi === "TI" ? "selected" : ""}}>Teknik
                                            Informatika</option>
                                        <option value="SI" {{$data->prodi === "SI" ? "selected" : ""}}>Sistem Informasi
                                        </option>
                                        <option value="KM" {{$data->prodi === "KM" ? "selected" : ""}}>Kesehatan
                                            Masyarakat</option>
                                    </select>
                                </div>
                            </div>

                 
                            <button type="submit" class="btn btn-primary" id="submit">
                                Ubah
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                            <a href="{{route('mahasiswa.index')}}" class="btn btn-light pull-right">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection