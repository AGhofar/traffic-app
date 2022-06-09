@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Data Lalu Lintas</b></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item font-weight-bold">Simpang 4</li>
                        <li class="breadcrumb-item active">Data Lalu Lintas</li>
                    </ol>
                </div>
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                    <a href="{{ url('simpang4/data-lalu-lintas/tambah') }}" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i>&nbsp;&nbsp;New Case</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid ">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="data_lalu_lintas" class="table table-hover table-bordered w-100">
                        <thead>
                            <tr>
                                <th>Tanggal Survei</th>
                                <th>Nama Simpang</th>
                                <th>Standar Ekuivalen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_lalu_lintas as $data_lalu_lintas)
                            <tr>
                                <td>{{ $data_lalu_lintas->tgl_survei }}</td>
                                @foreach ($data_simpang as $simpang)
                                @if ($data_lalu_lintas->id_simpang === $simpang->id)
                                <td>{{ $simpang->nama_simpang }}</td>
                                <td>{{ $simpang->ekuivalen }}</td>
                                @endif
                                @endforeach
                                <td class="text-center">
                                    <a href="{{ url('simpang4/data-lalu-lintas/identifikasi/kendaraan-per-jam',$data_lalu_lintas->id) }}" type="button" class="btn btn-primary btn-sm">Identifikasi</a>
                                    <a onclick="return confirm('Are you sure?')" href="{{ url('simpang4/data-lalu-lintas/hapus',$data_lalu_lintas->id) }}" type="button" class="btn btn-danger btn-sm">Hapus</a>
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
        $("#data_lalu_lintas").DataTable({
            "searching": true,
            "ordering": true,
            "info": true,
            "responsive": true,
        });
    });
</script>
@endsection