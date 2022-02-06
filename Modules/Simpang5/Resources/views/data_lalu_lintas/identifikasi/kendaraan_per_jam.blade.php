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
                            Kendaraan per-Jam
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
                    <h3 class="card-title"><b>Kendaraan per-Jam</b></h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-bordered">
                            <tr>
                                <th rowspan="3" class="align-middle">Waktu</th>
                                <th colspan="16">{{ $data_simpang['jalan_utara'] }}</th>
                                <th colspan="16">{{ $data_simpang['jalan_timur'] }}</th>
                                <th colspan="16">{{ $data_simpang['jalan_selatan'] }}</th>
                                <th colspan="16">{{ $data_simpang['jalan_barat'] }}</th>
                                <th colspan="16">{{ $data_simpang['jalan_barat_laut'] }}</th>
                            </tr>
                            <tr>
                                <th colspan="4">RT1</th>
                                <th colspan="4">RT2</th>
                                <th colspan="4">ST</th>
                                <th colspan="4">LT</th>

                                <th colspan="4">RT</th>
                                <th colspan="4">ST1</th>
                                <th colspan="4">ST2</th>
                                <th colspan="4">LT</th>

                                <th colspan="4">RT</th>
                                <th colspan="4">ST1</th>
                                <th colspan="4">ST2</th>
                                <th colspan="4">LT</th>

                                <th colspan="4">RT</th>
                                <th colspan="4">ST</th>
                                <th colspan="4">LT1</th>
                                <th colspan="4">LT2</th>

                                <th colspan="4">RT</th>
                                <th colspan="4">ST1</th>
                                <th colspan="4">ST2</th>
                                <th colspan="4">LT</th>
                            </tr>
                            <tr>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                                <th>MC</th>
                                <th>LV</th>
                                <th>HV</th>
                                <th>UM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jams as $index => $jams)
                            <tr>
                                <td>{{$jams['jam_awal']}} - {{ $jams['jam_akhir']  }}</td>

                                <td>@isset($utara_RT1s[$index]['mc']) {{$utara_RT1s[$index]['mc']}} @endisset</td>
                                <td>@isset($utara_RT1s[$index]['lv']) {{$utara_RT1s[$index]['lv']}} @endisset</td>
                                <td>@isset($utara_RT1s[$index]['hv']) {{$utara_RT1s[$index]['hv']}} @endisset</td>
                                <td>@isset($utara_RT1s[$index]['um']) {{$utara_RT1s[$index]['um']}} @endisset</td>

                                <td>@isset($utara_RT2s[$index]['mc']) {{$utara_RT2s[$index]['mc']}} @endisset</td>
                                <td>@isset($utara_RT2s[$index]['lv']) {{$utara_RT2s[$index]['lv']}} @endisset</td>
                                <td>@isset($utara_RT2s[$index]['hv']) {{$utara_RT2s[$index]['hv']}} @endisset</td>
                                <td>@isset($utara_RT2s[$index]['um']) {{$utara_RT2s[$index]['um']}} @endisset</td>

                                <td>@isset($utara_STs[$index]['mc']) {{$utara_STs[$index]['mc']}} @endisset</td>
                                <td>@isset($utara_STs[$index]['lv']) {{$utara_STs[$index]['lv']}} @endisset</td>
                                <td>@isset($utara_STs[$index]['hv']) {{$utara_STs[$index]['hv']}} @endisset</td>
                                <td>@isset($utara_STs[$index]['um']) {{$utara_STs[$index]['um']}} @endisset</td>

                                <td>@isset($utara_LTs[$index]['mc']) {{$utara_LTs[$index]['mc']}} @endisset</td>
                                <td>@isset($utara_LTs[$index]['lv']) {{$utara_LTs[$index]['lv']}} @endisset</td>
                                <td>@isset($utara_LTs[$index]['hv']) {{$utara_LTs[$index]['hv']}} @endisset</td>
                                <td>@isset($utara_LTs[$index]['um']) {{$utara_LTs[$index]['um']}} @endisset</td>


                                <td>@isset($timur_RTs[$index]['mc']) {{$timur_RTs[$index]['mc']}} @endisset</td>
                                <td>@isset($timur_RTs[$index]['lv']) {{$timur_RTs[$index]['lv']}} @endisset</td>
                                <td>@isset($timur_RTs[$index]['hv']) {{$timur_RTs[$index]['hv']}} @endisset</td>
                                <td>@isset($timur_RTs[$index]['um']) {{$timur_RTs[$index]['um']}} @endisset</td>

                                <td>@isset($timur_ST1s[$index]['mc']) {{$timur_ST1s[$index]['mc']}} @endisset</td>
                                <td>@isset($timur_ST1s[$index]['lv']) {{$timur_ST1s[$index]['lv']}} @endisset</td>
                                <td>@isset($timur_ST1s[$index]['hv']) {{$timur_ST1s[$index]['hv']}} @endisset</td>
                                <td>@isset($timur_ST1s[$index]['um']) {{$timur_ST1s[$index]['um']}} @endisset</td>

                                <td>@isset($timur_ST2s[$index]['mc']) {{$timur_ST2s[$index]['mc']}} @endisset</td>
                                <td>@isset($timur_ST2s[$index]['lv']) {{$timur_ST2s[$index]['lv']}} @endisset</td>
                                <td>@isset($timur_ST2s[$index]['hv']) {{$timur_ST2s[$index]['hv']}} @endisset</td>
                                <td>@isset($timur_ST2s[$index]['um']) {{$timur_ST2s[$index]['um']}} @endisset</td>

                                <td>@isset($timur_LTs[$index]['mc']) {{$timur_LTs[$index]['mc']}} @endisset</td>
                                <td>@isset($timur_LTs[$index]['lv']) {{$timur_LTs[$index]['lv']}} @endisset</td>
                                <td>@isset($timur_LTs[$index]['hv']) {{$timur_LTs[$index]['hv']}} @endisset</td>
                                <td>@isset($timur_LTs[$index]['um']) {{$timur_LTs[$index]['um']}} @endisset</td>


                                <td>@isset($selatan_RTs[$index]['mc']) {{$selatan_RTs[$index]['mc']}} @endisset</td>
                                <td>@isset($selatan_RTs[$index]['lv']) {{$selatan_RTs[$index]['lv']}} @endisset</td>
                                <td>@isset($selatan_RTs[$index]['hv']) {{$selatan_RTs[$index]['hv']}} @endisset</td>
                                <td>@isset($selatan_RTs[$index]['um']) {{$selatan_RTs[$index]['um']}} @endisset</td>

                                <td>@isset($selatan_ST1s[$index]['mc']) {{$selatan_ST1s[$index]['mc']}} @endisset</td>
                                <td>@isset($selatan_ST1s[$index]['lv']) {{$selatan_ST1s[$index]['lv']}} @endisset</td>
                                <td>@isset($selatan_ST1s[$index]['hv']) {{$selatan_ST1s[$index]['hv']}} @endisset</td>
                                <td>@isset($selatan_ST1s[$index]['um']) {{$selatan_ST1s[$index]['um']}} @endisset</td>

                                <td>@isset($selatan_ST2s[$index]['mc']) {{$selatan_ST2s[$index]['mc']}} @endisset</td>
                                <td>@isset($selatan_ST2s[$index]['lv']) {{$selatan_ST2s[$index]['lv']}} @endisset</td>
                                <td>@isset($selatan_ST2s[$index]['hv']) {{$selatan_ST2s[$index]['hv']}} @endisset</td>
                                <td>@isset($selatan_ST2s[$index]['um']) {{$selatan_ST2s[$index]['um']}} @endisset</td>

                                <td>@isset($selatan_LTs[$index]['mc']) {{$selatan_LTs[$index]['mc']}} @endisset</td>
                                <td>@isset($selatan_LTs[$index]['lv']) {{$selatan_LTs[$index]['lv']}} @endisset</td>
                                <td>@isset($selatan_LTs[$index]['hv']) {{$selatan_LTs[$index]['hv']}} @endisset</td>
                                <td>@isset($selatan_LTs[$index]['um']) {{$selatan_LTs[$index]['um']}} @endisset</td>

                                <td>@isset($barat_RTs[$index]['mc']) {{$barat_RTs[$index]['mc']}} @endisset</td>
                                <td>@isset($barat_RTs[$index]['lv']) {{$barat_RTs[$index]['lv']}} @endisset</td>
                                <td>@isset($barat_RTs[$index]['hv']) {{$barat_RTs[$index]['hv']}} @endisset</td>
                                <td>@isset($barat_RTs[$index]['um']) {{$barat_RTs[$index]['um']}} @endisset</td>

                                <td>@isset($barat_STs[$index]['mc']) {{$barat_STs[$index]['mc']}} @endisset</td>
                                <td>@isset($barat_STs[$index]['lv']) {{$barat_STs[$index]['lv']}} @endisset</td>
                                <td>@isset($barat_STs[$index]['hv']) {{$barat_STs[$index]['hv']}} @endisset</td>
                                <td>@isset($barat_STs[$index]['um']) {{$barat_STs[$index]['um']}} @endisset</td>

                                <td>@isset($barat_LT1s[$index]['mc']) {{$barat_LT1s[$index]['mc']}} @endisset</td>
                                <td>@isset($barat_LT1s[$index]['lv']) {{$barat_LT1s[$index]['lv']}} @endisset</td>
                                <td>@isset($barat_LT1s[$index]['hv']) {{$barat_LT1s[$index]['hv']}} @endisset</td>
                                <td>@isset($barat_LT1s[$index]['um']) {{$barat_LT1s[$index]['um']}} @endisset</td>

                                <td>@isset($barat_LT2s[$index]['mc']) {{$barat_LT2s[$index]['mc']}} @endisset</td>
                                <td>@isset($barat_LT2s[$index]['lv']) {{$barat_LT2s[$index]['lv']}} @endisset</td>
                                <td>@isset($barat_LT2s[$index]['hv']) {{$barat_LT2s[$index]['hv']}} @endisset</td>
                                <td>@isset($barat_LT2s[$index]['um']) {{$barat_LT2s[$index]['um']}} @endisset</td>

                                <td>@isset($barat_laut_RTs[$index]['mc']) {{$barat_laut_RTs[$index]['mc']}} @endisset</td>
                                <td>@isset($barat_laut_RTs[$index]['lv']) {{$barat_laut_RTs[$index]['lv']}} @endisset</td>
                                <td>@isset($barat_laut_RTs[$index]['hv']) {{$barat_laut_RTs[$index]['hv']}} @endisset</td>
                                <td>@isset($barat_laut_RTs[$index]['um']) {{$barat_laut_RTs[$index]['um']}} @endisset</td>

                                <td>@isset($barat_laut_ST1s[$index]['mc']) {{$barat_laut_ST1s[$index]['mc']}} @endisset</td>
                                <td>@isset($barat_laut_ST1s[$index]['lv']) {{$barat_laut_ST1s[$index]['lv']}} @endisset</td>
                                <td>@isset($barat_laut_ST1s[$index]['hv']) {{$barat_laut_ST1s[$index]['hv']}} @endisset</td>
                                <td>@isset($barat_laut_ST1s[$index]['um']) {{$barat_laut_ST1s[$index]['um']}} @endisset</td>

                                <td>@isset($barat_laut_ST2s[$index]['mc']) {{$barat_laut_ST2s[$index]['mc']}} @endisset</td>
                                <td>@isset($barat_laut_ST2s[$index]['lv']) {{$barat_laut_ST2s[$index]['lv']}} @endisset</td>
                                <td>@isset($barat_laut_ST2s[$index]['hv']) {{$barat_laut_ST2s[$index]['hv']}} @endisset</td>
                                <td>@isset($barat_laut_ST2s[$index]['um']) {{$barat_laut_ST2s[$index]['um']}} @endisset</td>

                                <td>@isset($barat_laut_LTs[$index]['mc']) {{$barat_laut_LTs[$index]['mc']}} @endisset</td>
                                <td>@isset($barat_laut_LTs[$index]['lv']) {{$barat_laut_LTs[$index]['lv']}} @endisset</td>
                                <td>@isset($barat_laut_LTs[$index]['hv']) {{$barat_laut_LTs[$index]['hv']}} @endisset</td>
                                <td>@isset($barat_laut_LTs[$index]['um']) {{$barat_laut_LTs[$index]['um']}} @endisset</td>
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