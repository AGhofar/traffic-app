@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Identifikasi</b></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item font-weight-bold">Simpang 4</li>
                        <li class="breadcrumb-item"><a href="{{ url('/simpang4/identifikasi') }}">Identifikasi</a></li>
                        <li class="breadcrumb-item active">Hasil</li>
                    </ol>
                </div>
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                            Komposisi Kendaraan
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ url('/simpang4/data-lalu-lintas/identifikasi/kendaraan-per-jam',$id) }}">Kendaraan per-Jam</a>
                            <a class="dropdown-item" href="{{ url('/simpang4/data-lalu-lintas/identifikasi/smp-per-jam',$id) }}">SMP per-Jam</a>
                            <a class="dropdown-item" href="{{ url('/simpang4/data-lalu-lintas/identifikasi/fluktasi-lalu-lintas',$id) }}">Fluktasi Lalu Lintas</a>
                            <a class="dropdown-item" href="{{ url('/simpang4/data-lalu-lintas/identifikasi/komposisi-kendaraan',$id) }}">Komposisi Kendaraan</a>
                            <a class="dropdown-item" href="{{ url('/simpang4/data-lalu-lintas/identifikasi/komposisi-pergerakan',$id) }}">Komposisi Pergerakan</a>
                            <a class="dropdown-item" href="{{ url('/simpang4/data-lalu-lintas/identifikasi/jam-puncak',$id) }}">Jam Puncak</a>
                        </div>
                        <a href="#" class="btn btn-success" onclick="window.print()">
                            <i class="fas fa-print"></i>&nbsp;&nbsp;Cetak
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Komposisi Kendaraan</b></h3>
                </div>
                <div class="card-body row">
                    <div class="table-responsive col-xs-12 col-sm-6 col-md-6">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="table-bordered">
                                <tr>
                                    <th>Nama Kendaraan</th>
                                    <th>Jumlah</th>
                                    <th>Presentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($total_table as $i)
                                <tr>
                                    <td @isset($i['bold']) style="font-weight:bold;" @endisset class="text-left">{{$i['nama']}}</td>
                                    <td @isset($i['bold']) style="font-weight:bold;" @endisset class="text-right">{{$i['jumlah']}}</td>
                                    <td @isset($i['bold']) style="font-weight:bold;" @endisset class="text-right">{{$i['persentase']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <canvas id="pieChart" style="height: 500px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<script>
    dataset = {!!json_encode($total_chart) !!};

    var label_ = [];
    var color_ = [];
    var value_ = [];

    for (var i = 0; i < dataset.length; i++) {
        label_.push(dataset[i]['label']);
        color_.push(dataset[i]['color']);
        value_.push(dataset[i]['value']);
    }

    var ctx = document.getElementById("pieChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: label_,
            datasets: [{
                data: value_,
                backgroundColor: color_,
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });
</script>
@endsection