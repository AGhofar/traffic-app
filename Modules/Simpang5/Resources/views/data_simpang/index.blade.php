@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Simpang</b></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item font-weight-bold">Simpang 5</li>
                        <li class="breadcrumb-item active">Data Simpang</li>
                    </ol>
                </div>
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                    <a href="{{ url('simpang5/data-simpang/tambah') }}" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Data</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid ">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="data-simpang" class="table table-hover table-bordered w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Simpang</th>
                                <th>Lengan Utara</th>
                                <th>Lengan Timur</th>
                                <th>Lengan Selatan</th>
                                <th>Lengan Barat</th>
                                <th>Lengan Barat Laut</th>
                                <th>Ekuivalen</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_simpang as $data_simpang)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $data_simpang->nama_simpang }}</td>
                                <td>{{ $data_simpang->jalan_utara }}</td>
                                <td>{{ $data_simpang->jalan_timur }}</td>
                                <td>{{ $data_simpang->jalan_selatan }}</td>
                                <td>{{ $data_simpang->jalan_barat }}</td>
                                <td>{{ $data_simpang->jalan_barat_laut }}</td>
                                <td>{{ $data_simpang->tipe_ekuivalen }}</td>
                                <td>{{ $data_simpang->mc }}</td>
                                <td>{{ $data_simpang->lv }}</td>
                                <td>{{ $data_simpang->hv }}</td>
                                <td class="text-center">
                                    <a href="{{ url('simpang5/data-simpang/edit',$data_simpang->id) }}" type="button" class="btn btn-warning btn-sm">Edit</a>
                                    <a onclick="return confirm('Are you sure?')" href="{{ url('simpang5/data-simpang/hapus',$data_simpang->id) }}" type="button" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<script>
    $(document).ready(function() {
        $("#data-simpang").DataTable({
            "searching": true,
            "ordering": true,
            "info": true,
            "responsive": true,
        });
    });
</script>
@endsection