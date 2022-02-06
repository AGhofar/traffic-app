@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Identifikasi</b></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item font-weight-bold">Simpang 3</li>
                        <li class="breadcrumb-item"><a href="{{ url('/simpang3/identifikasi') }}">Identifikasi</a></li>
                        <li class="breadcrumb-item active">Hasil</li>
                    </ol>
                </div>
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                            Komposisi Pergerakan
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ url('/simpang3/data-lalu-lintas/identifikasi/kendaraan-per-jam',$id) }}">Kendaraan per-Jam</a>
                            <a class="dropdown-item" href="{{ url('/simpang3/data-lalu-lintas/identifikasi/smp-per-jam',$id) }}">SMP per-Jam</a>
                            <a class="dropdown-item" href="{{ url('/simpang3/data-lalu-lintas/identifikasi/fluktasi-lalu-lintas',$id) }}">Fluktasi Lalu Lintas</a>
                            <a class="dropdown-item" href="{{ url('/simpang3/data-lalu-lintas/identifikasi/komposisi-kendaraan',$id) }}">Komposisi Kendaraan</a>
                            <a class="dropdown-item" href="{{ url('/simpang3/data-lalu-lintas/identifikasi/komposisi-pergerakan',$id) }}">Komposisi Pergerakan</a>
                            <a class="dropdown-item" href="{{ url('/simpang3/data-lalu-lintas/identifikasi/jam-puncak',$id) }}">Jam Puncak</a>
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
                    <h3 class="card-title"><b>Komposisi Pergerakan</b></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="table-bordered">
                                <tr>
                                    <th colspan="2">Lengan Utara</th>
                                    <th colspan="2">Lengan Timur</th>
                                    <th colspan="2">Lengan Selatan</th>
                                </tr>
                                <tr>
                                    <th>ST</th>
                                    <th>LT</th>
                                    <th>RT</th>
                                    <th>LT</th>
                                    <th>RT</th>
                                    <th>ST</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data_table['utara_ST'] }}</td>
                                    <td>{{ $data_table['utara_LT'] }}</td>
                                    <td>{{ $data_table['timur_RT'] }}</td>
                                    <td>{{ $data_table['timur_LT'] }}</td>
                                    <td>{{ $data_table['selatan_RT'] }}</td>
                                    <td>{{ $data_table['selatan_ST'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <canvas id="myChart" style="height: 500px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<script>
    dataset = {!!json_encode($data_chart) !!};

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Utara ST', 'Utara LT', 'Timur RT', 'Timur LT', 'Selatan RT', 'Selatan ST'],
            datasets: [{
                label: 'Komposisi Pergerakan',
                data: dataset,
                backgroundColor: ['#007bff', '#adb5bd', '#007bff', '#adb5bd', '#007bff', '#adb5bd'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });
</script>
@endsection