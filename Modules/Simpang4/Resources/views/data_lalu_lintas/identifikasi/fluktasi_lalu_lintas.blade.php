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
                            Fluktasi Lalu Lintas
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
                    <h3 class="card-title"><b>Fluktasi Lalu Lintas</b></h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="myChart" style="height: 500px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<script>
    $(document).ready(function() {
        var dataset = {!!json_encode($totals) !!};
        var jams = {!!json_encode($jams) !!};

        var labels_ = [];
        var data_utara = [];
        var data_timur = [];
        var data_selatan = [];
        var data_barat = [];
        var total_ = [];

        for (var i = 0; i < jams.length; i++) {
            var nama = jams[i]['jam_awal'] + " - " + jams[i]['jam_akhir'];
            labels_.push(nama);
        };

        for (var i = 0; i < dataset.length; i++) {
            data_utara.push(dataset[i]['total_utara']);
            data_timur.push(dataset[i]['total_timur']);
            data_selatan.push(dataset[i]['total_selatan']);
            data_barat.push(dataset[i]['total_barat']);
            total_.push(dataset[i]['grand_total']);
        }

        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels_,
                datasets: [{
                        label: 'Utara',
                        data: data_utara,
                        pointRadius: 0,
                        fill: false,
                        borderColor: '#dc3545',
                        borderWidth: 3

                    },
                    {
                        label: 'Timur',
                        data: data_timur,
                        pointRadius: 0,
                        fill: false,
                        borderColor: '#ffc107',
                        borderWidth: 3
                    },
                    {
                        label: 'Selatan',
                        data: data_selatan,
                        pointRadius: 0,
                        fill: false,
                        borderColor: '#28a745',
                        borderWidth: 3
                    },

                    {
                        label: 'Barat',
                        data: data_barat,
                        pointRadius: 0,
                        fill: false,
                        borderColor: '#6c757d',
                        borderWidth: 3
                    },
                    {
                        label: 'Total',
                        data: total_,
                        pointRadius: 0,
                        fill: false,
                        borderColor: '#007bff',
                        borderWidth: 3


                    }
                ]
            },
            options: {
                responsive: true, // Instruct chart js to respond nicely.
                maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
                scales: {
                    xAxes: [{
                        ticks: {
                            autoSkip: true,
                            maxRotation: 90,
                            minRotation: 90,
                            maxTicksLimit: 40
                        }
                    }]
                }
            }
        });
    });
</script>
@endsection