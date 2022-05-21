@section('js')

<script type="text/javascript">
    $(document).ready(function() {
        $(".users").select2();
    });
</script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('dosen.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Dosen baru</h4>

                            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label for="nama" class="col-md-4 control-label">Nama</label>
                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
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
                                    <input id="nidn" type="number" class="form-control" name="nidn" value="{{ old('nidn') }}" maxlength="8" required>
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
                                    <input id="tempat_lahir" type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
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
                                    <input id="tgl_lahir" type="date" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
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
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                <label for="level" class="col-md-4 control-label">Program Studi</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="prodi" required="">
                                        <option value=""></option>
                                        <option value="Informatika">Informatika</option>
                                        <option value="Teknik Sipil">Teknik Sipil</option>
                                        <option value="Fisika">Fisika</option>
                                        <option value="Manajemen">Manajemen</option>
                                        <option value="Akuntasi">Akuntansi</option>
                                        <option value="Pendidikan Agama Kristen">Pendidikan Agama Kristen</option>
                                        <option value="Musik Gereja">Musik Gereja</option>
                                        <option value="Theologia Konseling Kristen">Theologia Konseling Kristen</option>
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }} "
                            style="margin-bottom: 20px;">
                            <label for="user_id" class="col-md-4 control-label">User Login</label>
                            <div class="col-md-6">
                                <select class="form-control" name="user_id" required="">
                                    <option value="">(Cari User)</option>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary" id="submit">
                            Submit
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