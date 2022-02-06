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
                            Jam Puncak
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
                    <h3 class="card-title"><b>Jam Puncak</b></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="table-bordered">
                                <tr>
                                    <th class="text-center">Periode</th>
                                    <th class="text-center">Arus Terbesar</th>
                                    <th class="text-center">Jam Puncak</th>
                                    <th class="text-center">MC</th>
                                    <th class="text-center">LV</th>
                                    <th class="text-center">HV</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th rowspan="5" class="align-middle">Pagi<br>06:00 - 10:00<br><small>(durasi 4 Jam)</small></th>
                                    <td>{{ $data_simpang['jalan_utara'] }}</td>
                                    <td rowspan="4" class="align-middle">{{ $data_pagi_jam_puncak['jam_puncak'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_mc_utara'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_lv_utara'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_hv_utara'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_utara'] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $data_simpang['jalan_timur'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_mc_timur'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_lv_timur'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_hv_timur'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_timur'] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $data_simpang['jalan_selatan'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_mc_selatan'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_lv_selatan'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_hv_selatan'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_selatan'] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $data_simpang['jalan_barat'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_mc_barat'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_lv_barat'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_hv_barat'] }}</td>
                                    <td>{{ $data_pagi_jam_puncak['total_barat'] }}</td>
                                </tr>
                                <tr>
                                    <th colspan="5">Total</th>
                                    <th>{{ $data_pagi_jam_puncak['grand_total'] }}</th>
                                </tr>
                                <tr>
                                    <th rowspan="5" class="align-middle">Siang<br>10:00 - 14:00<br><small>(durasi 4 Jam)</small></th>
                                    <td>{{ $data_simpang['jalan_utara'] }}</td>
                                    <td rowspan="4" class="align-middle">{{ $data_siang_jam_puncak['jam_puncak'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_mc_utara'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_lv_utara'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_hv_utara'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_utara'] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $data_simpang['jalan_timur'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_mc_timur'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_lv_timur'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_hv_timur'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_timur'] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $data_simpang['jalan_selatan'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_mc_selatan'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_lv_selatan'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_hv_selatan'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_selatan'] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $data_simpang['jalan_barat'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_mc_barat'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_lv_barat'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_hv_barat'] }}</td>
                                    <td>{{ $data_siang_jam_puncak['total_barat'] }}</td>
                                </tr>
                                <tr>
                                    <th colspan="5">Total</th>
                                    <th>{{ $data_siang_jam_puncak['grand_total'] }}</th>
                                </tr>
                                <tr>
                                    <th rowspan="5" class="align-middle">Sore<br>14:00 - 18:00<br><small>(durasi 4 Jam)</small></th>
                                    <td>{{ $data_simpang['jalan_utara'] }}</td>
                                    <td rowspan="4" class="align-middle">{{ $data_sore_jam_puncak['jam_puncak'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_mc_utara'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_lv_utara'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_hv_utara'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_utara'] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $data_simpang['jalan_timur'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_mc_timur'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_lv_timur'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_hv_timur'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_timur'] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $data_simpang['jalan_selatan'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_mc_selatan'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_lv_selatan'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_hv_selatan'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_selatan'] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $data_simpang['jalan_barat'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_mc_barat'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_lv_barat'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_hv_barat'] }}</td>
                                    <td>{{ $data_sore_jam_puncak['total_barat'] }}</td>
                                </tr>
                                <tr>
                                    <th colspan="5">Total</th>
                                    <th>{{ $data_sore_jam_puncak['grand_total'] }}</th>
                                </tr>
                                <tr>
                                    <th rowspan="5" class="align-middle">Malam<br>18:00 - 06:00<br><small>(durasi 12 Jam)</small></th>
                                    <td>{{ $data_simpang['jalan_utara'] }}</td>
                                    <td rowspan="4" class="align-middle">{{ $data_malam_jam_puncak['jam_puncak'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_mc_utara'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_lv_utara'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_hv_utara'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_utara'] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $data_simpang['jalan_timur'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_mc_timur'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_lv_timur'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_hv_timur'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_timur'] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $data_simpang['jalan_selatan'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_mc_selatan'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_lv_selatan'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_hv_selatan'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_selatan'] }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $data_simpang['jalan_barat'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_mc_barat'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_lv_barat'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_hv_barat'] }}</td>
                                    <td>{{ $data_malam_jam_puncak['total_barat'] }}</td>
                                </tr>
                                <tr>
                                    <th colspan="5">Total</th>
                                    <th>{{ $data_malam_jam_puncak['grand_total'] }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card bg-primary text-center">
                        <div class="card-body">
                            <h3><b>Periode :{{ $periode }}</b></h3>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="table-bordered">
                                <tr>
                                    <th colspan="2">Pendekat</th>
                                    <th>Arah</th>
                                    <th>LV</th>
                                    <th>HV</th>
                                    <th>MC</th>
                                    <th>UM</th>
                                    <th>Total</th>
                                </tr>

                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="3" class="align-middle">Utara</td>
                                    <td rowspan="3" class="align-middle">{{$data_simpang['jalan_utara']}}</td>
                                    <td>LT/LTOR</td>
                                    <td>{{ $pendekat['utara_LT_lv'] }}</td>
                                    <td>{{ $pendekat['utara_LT_hv'] }}</td>
                                    <td>{{ $pendekat['utara_LT_mc'] }}</td>
                                    <td>{{ $pendekat['utara_LT_um'] }}</td>
                                    <td>{{ $pendekat['utara_LT'] }}</td>

                                </tr>
                                <tr>
                                    <td>ST</td>
                                    <td>{{ $pendekat['utara_ST_lv'] }}</td>
                                    <td>{{ $pendekat['utara_ST_hv'] }}</td>
                                    <td>{{ $pendekat['utara_ST_mc'] }}</td>
                                    <td>{{ $pendekat['utara_ST_um'] }}</td>
                                    <td>{{ $pendekat['utara_ST'] }}</td>
                                </tr>
                                <tr>
                                    <td>RT</td>
                                    <td>{{ $pendekat['utara_RT_lv'] }}</td>
                                    <td>{{ $pendekat['utara_RT_hv'] }}</td>
                                    <td>{{ $pendekat['utara_RT_mc'] }}</td>
                                    <td>{{ $pendekat['utara_RT_um'] }}</td>
                                    <td>{{ $pendekat['utara_RT'] }}</td>
                                </tr>
                                <tr>
                                    <td rowspan="3" class="align-middle">Selatan</td>
                                    <td rowspan="3" class="align-middle">{{$data_simpang['jalan_selatan']}}</td>
                                    <td>LT/LTOR</td>
                                    <td>{{ $pendekat['selatan_LT_lv'] }}</td>
                                    <td>{{ $pendekat['selatan_LT_hv'] }}</td>
                                    <td>{{ $pendekat['selatan_LT_mc'] }}</td>
                                    <td>{{ $pendekat['selatan_LT_um'] }}</td>
                                    <td>{{ $pendekat['selatan_LT'] }}</td>
                                </tr>
                                <tr>
                                    <td>ST</td>
                                    <td>{{ $pendekat['selatan_ST_lv'] }}</td>
                                    <td>{{ $pendekat['selatan_ST_hv'] }}</td>
                                    <td>{{ $pendekat['selatan_ST_mc'] }}</td>
                                    <td>{{ $pendekat['selatan_ST_um'] }}</td>
                                    <td>{{ $pendekat['selatan_ST'] }}</td>
                                </tr>
                                <tr>
                                    <td>RT</td>
                                    <td>{{ $pendekat['selatan_RT_lv'] }}</td>
                                    <td>{{ $pendekat['selatan_RT_hv'] }}</td>
                                    <td>{{ $pendekat['selatan_RT_mc'] }}</td>
                                    <td>{{ $pendekat['selatan_RT_um'] }}</td>
                                    <td>{{ $pendekat['selatan_RT'] }}</td>
                                </tr>
                                <tr>
                                    <td rowspan="3" class="align-middle">Timur</td>
                                    <td rowspan="3" class="align-middle">{{$data_simpang['jalan_timur']}}</td>
                                    <td>LT/LTOR</td>
                                    <td>{{ $pendekat['timur_LT_lv'] }}</td>
                                    <td>{{ $pendekat['timur_LT_hv'] }}</td>
                                    <td>{{ $pendekat['timur_LT_mc'] }}</td>
                                    <td>{{ $pendekat['timur_LT_um'] }}</td>
                                    <td>{{ $pendekat['timur_LT'] }}</td>
                                </tr>
                                <tr>
                                    <td>ST</td>
                                    <td>{{ $pendekat['timur_ST_lv'] }}</td>
                                    <td>{{ $pendekat['timur_ST_hv'] }}</td>
                                    <td>{{ $pendekat['timur_ST_mc'] }}</td>
                                    <td>{{ $pendekat['timur_ST_um'] }}</td>
                                    <td>{{ $pendekat['timur_ST'] }}</td>
                                </tr>
                                <tr>
                                    <td>RT</td>
                                    <td>{{ $pendekat['timur_RT_lv'] }}</td>
                                    <td>{{ $pendekat['timur_RT_hv'] }}</td>
                                    <td>{{ $pendekat['timur_RT_mc'] }}</td>
                                    <td>{{ $pendekat['timur_RT_um'] }}</td>
                                    <td>{{ $pendekat['timur_RT'] }}</td>
                                </tr>
                                <tr>
                                    <td rowspan="3" class="align-middle">Barat</td>
                                    <td rowspan="3" class="align-middle">{{$data_simpang['jalan_barat']}}</td>
                                    <td>LT/LTOR</td>
                                    <td>{{ $pendekat['barat_LT_lv'] }}</td>
                                    <td>{{ $pendekat['barat_LT_hv'] }}</td>
                                    <td>{{ $pendekat['barat_LT_mc'] }}</td>
                                    <td>{{ $pendekat['barat_LT_um'] }}</td>
                                    <td>{{ $pendekat['barat_LT'] }}</td>
                                </tr>
                                <tr>
                                    <td>ST</td>
                                    <td>{{ $pendekat['barat_ST_lv'] }}</td>
                                    <td>{{ $pendekat['barat_ST_hv'] }}</td>
                                    <td>{{ $pendekat['barat_ST_mc'] }}</td>
                                    <td>{{ $pendekat['barat_ST_um'] }}</td>
                                    <td>{{ $pendekat['barat_ST'] }}</td>
                                </tr>
                                <tr>
                                    <td>RT</td>
                                    <td>{{ $pendekat['barat_RT_lv'] }}</td>
                                    <td>{{ $pendekat['barat_RT_hv'] }}</td>
                                    <td>{{ $pendekat['barat_RT_mc'] }}</td>
                                    <td>{{ $pendekat['barat_RT_um'] }}</td>
                                    <td>{{ $pendekat['barat_RT'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection