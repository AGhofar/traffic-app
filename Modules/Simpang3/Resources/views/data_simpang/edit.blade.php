@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Tambah Data Simpang</b></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item font-weight-bold">Simpang 3</li>
                        <li class="breadcrumb-item"><a href="{{ url('/simpang3/data-simpang') }}">Data Simpang</a></li>
                        <li class="breadcrumb-item active">Tambah Data Simpang</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid ">
            <div class="card">
                <form action="{{ url('/simpang3/data-simpang/update',$id) }}" autocomplete="off" method="POST">
                    @csrf
                    <div class="card-body row">
                        <div class="form-group col-12">
                            <label for="nama_simpang">Nama Simpang</label>
                            <input type="text" class="form-control" id="nama_simpang" name="nama_simpang" placeholder="Nama Simpang" value="{{ $data_simpang->nama_simpang }}" required>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-xl-6">
                            <label for="jalan_utara">Lengan Utara</label>
                            <input type="text" class="form-control" id="jalan_utara" name="jalan_utara" placeholder="Nama Jalan ..." value="{{ $data_simpang->jalan_utara }}" required>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-xl-6">
                            <label for="jalan_timur">Lengan Timur</label>
                            <input type="text" class="form-control" id="jalan_timur" name="jalan_timur" placeholder="Nama Jalan ..." value="{{ $data_simpang->jalan_timur }}" required>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-xl-6">
                            <label for="jalan_selatan">Lengan Selatan</label>
                            <input type="text" class="form-control" id="jalan_selatan" name="jalan_selatan" placeholder="Nama Jalan ..." value="{{ $data_simpang->jalan_selatan }}" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="tipe_ekuivalen">Standar Ekuivalen</label>
                            <input type="text" class="form-control" id="tipe_ekuivalen" name="tipe_ekuivalen" value="{{ $data_simpang->tipe_ekuivalen }}" required readonly>
                        </div>
                        <div class="form-group col-12">
                            <label for="mc">MC</label>
                            <input type="number" class="form-control" id="mc" name="mc" value="{{ $data_simpang->mc }}" required readonly>
                        </div>
                        <div class="form-group col-12">
                            <label for="lv">LV</label>
                            <input type="text" class="form-control" id="lv" name="lv" value="{{ $data_simpang->lv }}" required readonly>
                        </div>
                        <div class="form-group col-12">
                            <label for="hv">HV</label>
                            <input type="text" class="form-control" id="hv" name="hv" value="{{ $data_simpang->hv }}" required readonly>
                        </div>
                        <div class="col-12 row mt-3">
                            <div class="col-sm-12 col-md-6 col-xl-6">
                                <a href="{{ url('/simpang3/data-simpang') }}" class="btn btn-default btn-block">Batal</a>
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-6">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<script>
    // MKJI
    $(document).ready(function() {
        // Manual or MKJI
        $('#ekuivalen').change(function() {
            var eq = $('#ekuivalen').val();
            if (eq === 'MKJI') {
                $('#mc').val('0.3');
                $('#lv').val('1.0');
                $('#hv').val('1.5');
            } else {
                $('#mc').val('');
                $('#lv').val('');
                $('#hv').val('');
            }
        });
        //Value Manual or MKJI
        var mc = $('#mc').val();
        var lv = $('#lv').val();
        var hv = $('#hv').val();
        $('#mc').change(function() {
            if (mc === '0.3' && lv === '1.0' && hv === '1.5') {
                $('#ekuivalen').val('MKJI');
            } else {
                $('#ekuivalen').val('Manual');
            }
        })
        $('#lv').change(function() {
            if (mc === '0.3' && lv === '1.0' && hv === '1.5') {
                $('#ekuivalen').val('MKJI');
            } else {
                $('#ekuivalen').val('Manual');
            }
        })
        $('#hv').change(function() {
            if (mc === '0.3' && lv === '1.0' && hv === '1.5') {
                $('#ekuivalen').val('MKJI');
            } else {
                $('#ekuivalen').val('Manual');
            }
        })
    });
    // End MKJI
</script>
@endsection