@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $(".users").select2();
    });
</script>
<script type="text/javascript">
    function readURL() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(input).prev().attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(function () {
        $(".uploads").change(readURL)
        $("#f").submit(function () {
            // do ajax submit or just classic form submit
            //  alert("fake subminting")
            return false
        })
    })
</script>
@stop
@extends('layouts.app')
@section('content')
<form action="{{ route('kategori.update', $data->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Kategori <b>{{$data->nama_kategori_buku}}</b> </h4>
                            <form class="forms-sample">
                                <div class="form-group{{ $errors->has('nama_kategori_buku') ? ' has-error' : '' }}">
                                    <label for="nama_kategori_buku" class="col-md-4 control-label">Kategori</label>
                                    <div class="col-md-6">
                                        <input id="nama_kategori_buku" type="text" class="form-control"
                                            name="nama_kategori_buku" value="{{ $data->nama_kategori_buku }}" required>
                                        @if ($errors->has('nama_kategori_buku'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama_kategori_buku') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="submit">Update</button>
                                <a href="{{route('kategori.index')}}" class="btn btn-light pull-right">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection