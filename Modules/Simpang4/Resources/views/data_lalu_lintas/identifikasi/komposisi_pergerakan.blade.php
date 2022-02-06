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
                            Komposisi Pergerakan
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
                    <h3 class="card-title"><b>Komposisi Pergerakan</b></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="table-bordered">
                                <tr>
                                    <th colspan="3">Lengan Utara</th>
                                    <th colspan="3">Lengan Timur</th>
                                    <th colspan="3">Lengan Selatan</th>
                                    <th colspan="3">Lengan Barat</th>
                                </tr>
                                <tr>
                                    <th>RT</th>
                                    <th>ST</th>
                                    <th>LT</th>

                                    <th>RT</th>
                                    <th>ST</th>
                                    <th>LT</th>

                                    <th>RT</th>
                                    <th>ST</th>
                                    <th>LT</th>

                                    <th>RT</th>
                                    <th>ST</th>
                                    <th>LT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data_table['utara_RT'] }}</td>
                                    <td>{{ $data_table['utara_ST'] }}</td>
                                    <td>{{ $data_table['utara_LT'] }}</td>

                                    <td>{{ $data_table['timur_RT'] }}</td>
                                    <td>{{ $data_table['timur_ST'] }}</td>
                                    <td>{{ $data_table['timur_LT'] }}</td>

                                    <td>{{ $data_table['selatan_RT'] }}</td>
                                    <td>{{ $data_table['selatan_ST'] }}</td>
                                    <td>{{ $data_table['selatan_LT'] }}</td>

                                    <td>{{ $data_table['barat_RT'] }}</td>
                                    <td>{{ $data_table['barat_ST'] }}</td>
                                    <td>{{ $data_table['barat_LT'] }}</td>
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
            labels: [
                'Utara RT', 'Utara ST', 'Utara LT',
                'Timur RT', 'Timur ST', 'Timur LT',
                'Selatan RT', 'Selatan ST', 'Selatan LT',
                'Barat RT', 'Barat ST', 'Barat LT',
            ],
            datasets: [{
                label: 'Komposisi Pergerakan',
                data: dataset,
                backgroundColor: ['#001f3f', '#007bff', '#adb5bd', '#001f3f', '#007bff', '#adb5bd', '#001f3f', '#007bff', '#adb5bd', '#001f3f', '#007bff', '#adb5bd'],
            }]
        },
        options: {
            responsive: true, // Instruct chart js to respond nicely.
            maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
        }
    });
</script>
@endsection