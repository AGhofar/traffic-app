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
                            SMP per-Jam
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
                    <h3 class="card-title"><b>SMP per-Jam</b></h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-bordered text-center">
                            <tr>
                                <th rowspan="3" class="align-middle">Waktu</th>
                                <th colspan="7">{{$data_simpang['jalan_utara']}}</th>
                                <th colspan="7">{{$data_simpang['jalan_timur']}}</th>
                                <th colspan="7">{{$data_simpang['jalan_selatan']}}</th>
                                <th rowspan="3" class="align-middle">Grand Total</th>
                            </tr>
                            <tr>
                                <th colspan="3">ST</th>
                                <th colspan="3">LT</th>
                                <th rowspan="2" class="align-middle">Total</th>
                                <th colspan="3">RT</th>
                                <th colspan="3">LT</th>
                                <th rowspan="2" class="align-middle">Total</th>
                                <th colspan="3">RT</th>
                                <th colspan="3">ST</th>
                                <th rowspan="2" class="align-middle">Total</th>
                            </tr>
                            <tr>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                            </tr>
                        </thead>
                        <tbody class="text-right">
                            @foreach($jams as $index => $jams)
                            <tr>
                                <td class="text-center">{{$jams['jam_awal']}} - {{ $jams['jam_akhir']  }}</td>

                                <td>@isset($utara_STs[$index]['mc']) {{$utara_STs[$index]['mc']}} @endisset</td>
                                <td>@isset($utara_STs[$index]['lv']) {{$utara_STs[$index]['lv']}} @endisset</td>
                                <td>@isset($utara_STs[$index]['hv']) {{$utara_STs[$index]['hv']}} @endisset</td>

                                <td>@isset($utara_LTs[$index]['mc']) {{$utara_LTs[$index]['mc']}} @endisset</td>
                                <td>@isset($utara_LTs[$index]['lv']) {{$utara_LTs[$index]['lv']}} @endisset</td>
                                <td>@isset($utara_LTs[$index]['hv']) {{$utara_LTs[$index]['hv']}} @endisset</td>

                                <td><b>{{$totals[$index]['total_utara']}}</b></td>

                                <td>@isset($timur_RTs[$index]['mc']) {{$timur_RTs[$index]['mc']}} @endisset</td>
                                <td>@isset($timur_RTs[$index]['lv']) {{$timur_RTs[$index]['lv']}} @endisset</td>
                                <td>@isset($timur_RTs[$index]['hv']) {{$timur_RTs[$index]['hv']}} @endisset</td>

                                <td>@isset($timur_LTs[$index]['mc']) {{$timur_LTs[$index]['mc']}} @endisset</td>
                                <td>@isset($timur_LTs[$index]['lv']) {{$timur_LTs[$index]['lv']}} @endisset</td>
                                <td>@isset($timur_LTs[$index]['hv']) {{$timur_LTs[$index]['hv']}} @endisset</td>

                                <td><b>{{$totals[$index]['total_timur']}}</b></td>

                                <td>@isset($selatan_RTs[$index]['mc']) {{$selatan_RTs[$index]['mc']}} @endisset</td>
                                <td>@isset($selatan_RTs[$index]['lv']) {{$selatan_RTs[$index]['lv']}} @endisset</td>
                                <td>@isset($selatan_RTs[$index]['hv']) {{$selatan_RTs[$index]['hv']}} @endisset</td>

                                <td>@isset($selatan_STs[$index]['mc']) {{$selatan_STs[$index]['mc']}} @endisset</td>
                                <td>@isset($selatan_STs[$index]['lv']) {{$selatan_STs[$index]['lv']}} @endisset</td>
                                <td>@isset($selatan_STs[$index]['hv']) {{$selatan_STs[$index]['hv']}} @endisset</td>

                                <td><b>{{$totals[$index]['total_selatan']}}</b></td>

                                <td><b>{{$totals[$index]['grand_total']}}</b></td>
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
@endsection