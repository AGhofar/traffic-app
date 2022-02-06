@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Identifikasi</b></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item font-weight-bold">Simpang 5</li>
                        <li class="breadcrumb-item"><a href="{{ url('/simpang5/identifikasi') }}">Identifikasi</a></li>
                        <li class="breadcrumb-item active">Hasil</li>
                    </ol>
                </div>
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                            SMP per-Jam
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ url('/simpang5/data-lalu-lintas/identifikasi/kendaraan-per-jam',$id) }}">Kendaraan per-Jam</a>
                            <a class="dropdown-item" href="{{ url('/simpang5/data-lalu-lintas/identifikasi/smp-per-jam',$id) }}">SMP per-Jam</a>
                            <a class="dropdown-item" href="{{ url('/simpang5/data-lalu-lintas/identifikasi/fluktasi-lalu-lintas',$id) }}">Fluktasi Lalu Lintas</a>
                            <a class="dropdown-item" href="{{ url('/simpang5/data-lalu-lintas/identifikasi/komposisi-kendaraan',$id) }}">Komposisi Kendaraan</a>
                            <a class="dropdown-item" href="{{ url('/simpang5/data-lalu-lintas/identifikasi/komposisi-pergerakan',$id) }}">Komposisi Pergerakan</a>
                            <a class="dropdown-item" href="{{ url('/simpang5/data-lalu-lintas/identifikasi/jam-puncak',$id) }}">Jam Puncak</a>
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
                                <th colspan="13">{{$data_simpang['jalan_utara']}}</th>
                                <th colspan="13">{{$data_simpang['jalan_timur']}}</th>
                                <th colspan="13">{{$data_simpang['jalan_selatan']}}</th>
                                <th colspan="13">{{$data_simpang['jalan_barat']}}</th>
                                <th colspan="13">{{$data_simpang['jalan_barat_laut']}}</th>
                                <th rowspan="3" class="align-middle">Grand Total</th>
                            </tr>
                            <tr>
                                <th colspan="3">RT1</th>
                                <th colspan="3">RT2</th>
                                <th colspan="3">ST</th>
                                <th colspan="3">LT</th>
                                <th rowspan="2" class="align-middle">Total</th>

                                <th colspan="3">RT</th>
                                <th colspan="3">ST1</th>
                                <th colspan="3">ST2</th>
                                <th colspan="3">LT</th>
                                <th rowspan="2" class="align-middle">Total</th>

                                <th colspan="3">RT</th>
                                <th colspan="3">ST1</th>
                                <th colspan="3">ST2</th>
                                <th colspan="3">LT</th>
                                <th rowspan="2" class="align-middle">Total</th>

                                <th colspan="3">RT</th>
                                <th colspan="3">ST</th>
                                <th colspan="3">LT1</th>
                                <th colspan="3">LT2</th>
                                <th rowspan="2" class="align-middle">Total</th>

                                <th colspan="3">RT</th>
                                <th colspan="3">ST1</th>
                                <th colspan="3">ST2</th>
                                <th colspan="3">LT</th>
                                <th rowspan="2" class="align-middle">Total</th>

                            </tr>
                            <tr>
                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>

                                <td>MC</td>
                                <td>LV</td>
                                <td>HV</td>
                            </tr>
                        </thead>
                        <tbody id="target_table_body text-right">
                            @foreach($jams as $index => $jams)
                            <tr>
                                <td>{{$jams['jam_awal']}} - {{ $jams['jam_akhir']  }}</td>

                                <td class="text-right">@isset($utara_RT1s[$index]['mc']) {{$utara_RT1s[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($utara_RT1s[$index]['lv']) {{$utara_RT1s[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($utara_RT1s[$index]['hv']) {{$utara_RT1s[$index]['hv']}} @endisset</td>

                                <td class="text-right">@isset($utara_RT2s[$index]['mc']) {{$utara_RT2s[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($utara_RT2s[$index]['lv']) {{$utara_RT2s[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($utara_RT2s[$index]['hv']) {{$utara_RT2s[$index]['hv']}} @endisset</td>

                                <td class="text-right">@isset($utara_STs[$index]['mc']) {{$utara_STs[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($utara_STs[$index]['lv']) {{$utara_STs[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($utara_STs[$index]['hv']) {{$utara_STs[$index]['hv']}} @endisset</td>

                                <td class="text-right">@isset($utara_LTs[$index]['mc']) {{$utara_LTs[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($utara_LTs[$index]['lv']) {{$utara_LTs[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($utara_LTs[$index]['hv']) {{$utara_LTs[$index]['hv']}} @endisset</td>

                                <th>{{$totals[$index]['total_utara']}}</th>

                                <td class="text-right">@isset($timur_RTs[$index]['mc']) {{$timur_RTs[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($timur_RTs[$index]['lv']) {{$timur_RTs[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($timur_RTs[$index]['hv']) {{$timur_RTs[$index]['hv']}} @endisset</td>

                                <td class="text-right">@isset($timur_ST1s[$index]['mc']) {{$timur_ST1s[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($timur_ST1s[$index]['lv']) {{$timur_ST1s[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($timur_ST1s[$index]['hv']) {{$timur_ST1s[$index]['hv']}} @endisset</td>

                                <td class="text-right">@isset($timur_ST2s[$index]['mc']) {{$timur_ST2s[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($timur_ST2s[$index]['lv']) {{$timur_ST2s[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($timur_ST2s[$index]['hv']) {{$timur_ST2s[$index]['hv']}} @endisset</td>

                                <td class="text-right">@isset($timur_LTs[$index]['mc']) {{$timur_LTs[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($timur_LTs[$index]['lv']) {{$timur_LTs[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($timur_LTs[$index]['hv']) {{$timur_LTs[$index]['hv']}} @endisset</td>

                                <th>{{$totals[$index]['total_timur']}}</th>

                                <td class="text-right">@isset($selatan_RTs[$index]['mc']) {{$selatan_RTs[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($selatan_RTs[$index]['lv']) {{$selatan_RTs[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($selatan_RTs[$index]['hv']) {{$selatan_RTs[$index]['hv']}} @endisset</td>

                                <td class="text-right">@isset($selatan_ST1s[$index]['mc']) {{$selatan_ST1s[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($selatan_ST1s[$index]['lv']) {{$selatan_ST1s[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($selatan_ST1s[$index]['hv']) {{$selatan_ST1s[$index]['hv']}} @endisset</td>

                                <td class="text-right">@isset($selatan_ST2s[$index]['mc']) {{$selatan_ST2s[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($selatan_ST2s[$index]['lv']) {{$selatan_ST2s[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($selatan_ST2s[$index]['hv']) {{$selatan_ST2s[$index]['hv']}} @endisset</td>

                                <td class="text-right">@isset($selatan_LTs[$index]['mc']) {{$selatan_LTs[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($selatan_LTs[$index]['lv']) {{$selatan_LTs[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($selatan_LTs[$index]['hv']) {{$selatan_LTs[$index]['hv']}} @endisset</td>

                                <th>{{$totals[$index]['total_selatan']}}</th>


                                <td class="text-right">@isset($barat_RTs[$index]['mc']) {{$barat_RTs[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($barat_RTs[$index]['lv']) {{$barat_RTs[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($barat_RTs[$index]['hv']) {{$barat_RTs[$index]['hv']}} @endisset</td>

                                <td class="text-right">@isset($barat_STs[$index]['mc']) {{$barat_STs[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($barat_STs[$index]['lv']) {{$barat_STs[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($barat_STs[$index]['hv']) {{$barat_STs[$index]['hv']}} @endisset</td>

                                <td class="text-right">@isset($barat_LT1s[$index]['mc']) {{$barat_LT1s[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($barat_LT1s[$index]['lv']) {{$barat_LT1s[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($barat_LT1s[$index]['hv']) {{$barat_LT1s[$index]['hv']}} @endisset</td>

                                <td class="text-right">@isset($barat_LT2s[$index]['mc']) {{$barat_LT2s[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($barat_LT2s[$index]['lv']) {{$barat_LT2s[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($barat_LT2s[$index]['hv']) {{$barat_LT2s[$index]['hv']}} @endisset</td>

                                <th>{{$totals[$index]['total_barat']}}</th>

                                <td class="text-right">@isset($barat_laut_RTs[$index]['mc']) {{$barat_laut_RTs[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($barat_laut_RTs[$index]['lv']) {{$barat_laut_RTs[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($barat_laut_RTs[$index]['hv']) {{$barat_laut_RTs[$index]['hv']}} @endisset</td>

                                <td class="text-right">@isset($barat_laut_ST1s[$index]['mc']) {{$barat_laut_ST1s[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($barat_laut_ST1s[$index]['lv']) {{$barat_laut_ST1s[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($barat_laut_ST1s[$index]['hv']) {{$barat_laut_ST1s[$index]['hv']}} @endisset</td>

                                <td class="text-right">@isset($barat_laut_ST2s[$index]['mc']) {{$barat_laut_ST2s[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($barat_laut_ST2s[$index]['lv']) {{$barat_laut_ST2s[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($barat_laut_ST2s[$index]['hv']) {{$barat_laut_ST2s[$index]['hv']}} @endisset</td>

                                <td class="text-right">@isset($barat_laut_LTs[$index]['mc']) {{$barat_laut_LTs[$index]['mc']}} @endisset</td>
                                <td class="text-right">@isset($barat_laut_LTs[$index]['lv']) {{$barat_laut_LTs[$index]['lv']}} @endisset</td>
                                <td class="text-right">@isset($barat_laut_LTs[$index]['hv']) {{$barat_laut_LTs[$index]['hv']}} @endisset</td>

                                <th>{{$totals[$index]['total_barat_laut']}}</th>

                                <th>{{$totals[$index]['grand_total']}}</th>
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