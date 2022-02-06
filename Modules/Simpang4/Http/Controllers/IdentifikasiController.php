<?php

namespace Modules\Simpang4\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Simpang4\Entities\DataLaluLintas;
use Modules\Simpang4\Entities\Simpang4;

class IdentifikasiController extends Controller
{
    public function kendaraan_per_jam($id)
    {
        $data_lalu_lintas = DataLaluLintas::find($id);
        $id_simpang = $data_lalu_lintas->id_simpang;
        $data_simpang = Simpang4::find($id_simpang);
        $jumlah_data = count($data_lalu_lintas->utara_LT);

        $jams = array();

        $utara_RTs = array();
        $utara_STs = array();
        $utara_LTs = array();

        $timur_RTs = array();
        $timur_STs = array();
        $timur_LTs = array();

        $selatan_RTs = array();
        $selatan_STs = array();
        $selatan_LTs = array();

        $barat_RTs = array();
        $barat_STs = array();
        $barat_LTs = array();

        for ($i = 0; $i < $jumlah_data; $i++) {
            $jam_awal = $data_lalu_lintas->utara_LT[$i]['jam_awal'];
            $split_jam_awal = explode('.', $jam_awal);
            $new_jam_akhir = $split_jam_awal[0] + 1;
            if ($new_jam_akhir >= 0 & $new_jam_akhir <= 9) {
                $new_jam_akhir = "0" . $new_jam_akhir;
            }
            $jam_akhir = $new_jam_akhir . '.' . $split_jam_awal[1];
            $new_jam = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir
            );
            $jams[] = $new_jam;
        }

        foreach ($jams as $jam) {
            $jam_awal = $jam['jam_awal'];
            $jam_akhir = $jam['jam_akhir'];
            $utara_RT_mc = 0;
            $utara_RT_lv = 0;
            $utara_RT_hv = 0;
            $utara_RT_um = 0;

            $utara_ST_mc = 0;
            $utara_ST_lv = 0;
            $utara_ST_hv = 0;
            $utara_ST_um = 0;

            $utara_LT_mc = 0;
            $utara_LT_lv = 0;
            $utara_LT_hv = 0;
            $utara_LT_um = 0;

            //timur
            $timur_RT_mc = 0;
            $timur_RT_lv = 0;
            $timur_RT_hv = 0;
            $timur_RT_um = 0;

            $timur_ST_mc = 0;
            $timur_ST_lv = 0;
            $timur_ST_hv = 0;
            $timur_ST_um = 0;

            $timur_LT_mc = 0;
            $timur_LT_lv = 0;
            $timur_LT_hv = 0;
            $timur_LT_um = 0;
            //selatan
            $selatan_RT_mc = 0;
            $selatan_RT_lv = 0;
            $selatan_RT_hv = 0;
            $selatan_RT_um = 0;

            $selatan_ST_mc = 0;
            $selatan_ST_lv = 0;
            $selatan_ST_hv = 0;
            $selatan_ST_um = 0;

            $selatan_LT_mc = 0;
            $selatan_LT_lv = 0;
            $selatan_LT_hv = 0;
            $selatan_LT_um = 0;
            //barat
            $barat_RT_mc = 0;
            $barat_RT_lv = 0;
            $barat_RT_hv = 0;
            $barat_RT_um = 0;

            $barat_ST_mc = 0;
            $barat_ST_lv = 0;
            $barat_ST_hv = 0;
            $barat_ST_um = 0;

            $barat_LT_mc = 0;
            $barat_LT_lv = 0;
            $barat_LT_hv = 0;
            $barat_LT_um = 0;

            for ($i = 0; $i < $jumlah_data; $i++) {
                $tmp_jam_awal = $data_lalu_lintas->utara_RT[$i]['jam_awal'];
                $tmp_jam_akhir = $data_lalu_lintas->utara_RT[$i]['jam_akhir'];

                if ($tmp_jam_awal >= $jam_awal && $tmp_jam_awal < $jam_akhir) {
                    $data1 = $data_lalu_lintas->utara_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->utara_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->utara_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->utara_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->utara_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->utara_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->utara_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->utara_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->utara_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->utara_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->utara_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->utara_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->utara_RT[$i]['becak'];

                    $utara_RT_mc += $data11;
                    $utara_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $utara_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $utara_RT_um += $data12 + $data13;

                    //Utara Lurus
                    $data1 =  $data_lalu_lintas->utara_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->utara_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->utara_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->utara_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->utara_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->utara_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->utara_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->utara_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->utara_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->utara_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->utara_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->utara_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->utara_ST[$i]['becak'];

                    $utara_ST_mc += $data11;
                    $utara_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $utara_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $utara_ST_um += $data12 + $data13;

                    //Utara  Kiri
                    $data1 = $data_lalu_lintas->utara_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->utara_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->utara_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->utara_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->utara_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->utara_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->utara_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->utara_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->utara_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->utara_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->utara_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->utara_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->utara_LT[$i]['becak'];

                    $utara_LT_mc += $data11;
                    $utara_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $utara_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $utara_LT_um += $data12 + $data13;
                    //Timur
                    //Timur Kanan
                    $data1 = $data_lalu_lintas->timur_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->timur_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->timur_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->timur_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->timur_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->timur_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->timur_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->timur_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->timur_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->timur_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->timur_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->timur_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->timur_RT[$i]['becak'];

                    $timur_RT_mc += $data11;
                    $timur_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $timur_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $timur_RT_um += $data12 + $data13;

                    //Timur ST
                    $data1 = $data_lalu_lintas->timur_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->timur_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->timur_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->timur_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->timur_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->timur_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->timur_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->timur_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->timur_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->timur_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->timur_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->timur_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->timur_ST[$i]['becak'];

                    $timur_ST_mc += $data11;
                    $timur_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $timur_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $timur_ST_um += $data12 + $data13;

                    //Timur Kiri
                    $data1 = $data_lalu_lintas->timur_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->timur_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->timur_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->timur_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->timur_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->timur_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->timur_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->timur_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->timur_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->timur_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->timur_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->timur_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->timur_LT[$i]['becak'];

                    $timur_LT_mc += $data11;
                    $timur_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $timur_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $timur_LT_um += $data12 + $data13;
                    //Selatan
                    //Selatan Kanan
                    $data1 = $data_lalu_lintas->selatan_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->selatan_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->selatan_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->selatan_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->selatan_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->selatan_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->selatan_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->selatan_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->selatan_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->selatan_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->selatan_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->selatan_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->selatan_RT[$i]['becak'];

                    $selatan_RT_mc += $data11;
                    $selatan_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $selatan_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $selatan_RT_um += $data12 + $data13;

                    //Selatan Lurus1
                    $data1 = $data_lalu_lintas->selatan_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->selatan_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->selatan_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->selatan_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->selatan_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->selatan_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->selatan_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->selatan_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->selatan_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->selatan_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->selatan_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->selatan_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->selatan_ST[$i]['becak'];

                    $selatan_ST_mc += $data11;
                    $selatan_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $selatan_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $selatan_ST_um += $data12 + $data13;

                    //Selatan LT
                    $data1 = $data_lalu_lintas->selatan_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->selatan_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->selatan_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->selatan_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->selatan_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->selatan_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->selatan_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->selatan_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->selatan_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->selatan_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->selatan_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->selatan_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->selatan_LT[$i]['becak'];

                    $selatan_LT_mc += $data11;
                    $selatan_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $selatan_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $selatan_LT_um += $data12 + $data13;
                    //Barat
                    //Barat Kanan
                    $data1 = $data_lalu_lintas->barat_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->barat_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->barat_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->barat_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->barat_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->barat_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->barat_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->barat_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->barat_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->barat_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->barat_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->barat_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->barat_RT[$i]['becak'];

                    $barat_RT_mc += $data11;
                    $barat_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $barat_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $barat_RT_um += $data12 + $data13;

                    //Barat ST
                    $data1 =  $data_lalu_lintas->barat_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->barat_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->barat_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->barat_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->barat_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->barat_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->barat_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->barat_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->barat_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->barat_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->barat_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->barat_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->barat_ST[$i]['becak'];

                    $barat_ST_mc += $data11;
                    $barat_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $barat_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $barat_ST_um += $data12 + $data13;

                    //Barat LT
                    $data1 = $data_lalu_lintas->barat_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->barat_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->barat_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->barat_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->barat_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->barat_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->barat_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->barat_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->barat_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->barat_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->barat_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->barat_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->barat_LT[$i]['becak'];

                    $barat_LT_mc += $data11;
                    $barat_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $barat_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $barat_LT_um += $data12 + $data13;
                } else {
                }
            }

            if ($jam_awal > 23.00) {
                $jam_awal = $jam_awal - 24.05;
                $jam_akhir = $jam_akhir - 24.05;
                for ($i = 0; $i < $jumlah_data; $i++) {
                    $tmp_jam_awal = $data_lalu_lintas->utara_RT[$i]['jam_awal'];
                    $tmp_jam_akhir = $data_lalu_lintas->utara_RT[$i]['jam_akhir'];
                    if ($tmp_jam_awal >= $jam_awal && $tmp_jam_awal < $jam_akhir) {
                        $data1 =  $data_lalu_lintas->utara_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->utara_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->utara_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->utara_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->utara_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->utara_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->utara_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->utara_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->utara_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->utara_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->utara_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->utara_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->utara_RT[$i]['becak'];

                        $utara_RT_mc += $data11;
                        $utara_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $utara_RT_hv += $data5 + $data8 + $data9 + $data10;
                        $utara_RT_um += $data12 + $data13;

                        //Utara Lurus
                        $data1 =  $data_lalu_lintas->utara_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->utara_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->utara_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->utara_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->utara_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->utara_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->utara_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->utara_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->utara_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->utara_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->utara_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->utara_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->utara_ST[$i]['becak'];

                        $utara_ST_mc += $data11;
                        $utara_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $utara_ST_hv += $data5 + $data8 + $data9 + $data10;
                        $utara_ST_um += $data12 + $data13;

                        //Utara  Kiri
                        $data1 = $data_lalu_lintas->utara_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->utara_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->utara_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->utara_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->utara_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->utara_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->utara_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->utara_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->utara_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->utara_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->utara_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->utara_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->utara_LT[$i]['becak'];

                        $utara_LT_mc += $data11;
                        $utara_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $utara_LT_hv += $data5 + $data8 + $data9 + $data10;
                        $utara_LT_um += $data12 + $data13;
                        //Timur
                        //Timur Kanan
                        $data1 = $data_lalu_lintas->timur_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->timur_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->timur_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->timur_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->timur_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->timur_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->timur_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->timur_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->timur_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->timur_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->timur_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->timur_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->timur_RT[$i]['becak'];

                        $timur_RT_mc += $data11;
                        $timur_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $timur_RT_hv += $data5 + $data8 + $data9 + $data10;
                        $timur_RT_um += $data12 + $data13;

                        //Timur ST
                        $data1 = $data_lalu_lintas->timur_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->timur_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->timur_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->timur_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->timur_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->timur_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->timur_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->timur_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->timur_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->timur_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->timur_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->timur_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->timur_ST[$i]['becak'];

                        $timur_ST_mc += $data11;
                        $timur_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $timur_ST_hv += $data5 + $data8 + $data9 + $data10;
                        $timur_ST_um += $data12 + $data13;

                        //Timur Kiri
                        $data1 = $data_lalu_lintas->timur_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->timur_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->timur_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->timur_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->timur_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->timur_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->timur_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->timur_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->timur_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->timur_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->timur_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->timur_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->timur_LT[$i]['becak'];

                        $timur_LT_mc += $data11;
                        $timur_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $timur_LT_hv += $data5 + $data8 + $data9 + $data10;
                        $timur_LT_um += $data12 + $data13;
                        //Selatan
                        //Selatan Kanan
                        $data1 = $data_lalu_lintas->selatan_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->selatan_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->selatan_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->selatan_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->selatan_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->selatan_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->selatan_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->selatan_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->selatan_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->selatan_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->selatan_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->selatan_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->selatan_RT[$i]['becak'];

                        $selatan_RT_mc += $data11;
                        $selatan_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $selatan_RT_hv += $data5 + $data8 + $data9 + $data10;
                        $selatan_RT_um += $data12 + $data13;

                        //Selatan Lurus1
                        $data1 = $data_lalu_lintas->selatan_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->selatan_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->selatan_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->selatan_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->selatan_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->selatan_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->selatan_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->selatan_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->selatan_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->selatan_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->selatan_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->selatan_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->selatan_ST[$i]['becak'];

                        $selatan_ST_mc += $data11;
                        $selatan_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $selatan_ST_hv += $data5 + $data8 + $data9 + $data10;
                        $selatan_ST_um += $data12 + $data13;

                        //Selatan LT
                        $data1 = $data_lalu_lintas->selatan_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->selatan_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->selatan_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->selatan_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->selatan_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->selatan_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->selatan_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->selatan_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->selatan_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->selatan_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->selatan_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->selatan_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->selatan_LT[$i]['becak'];

                        $selatan_LT_mc += $data11;
                        $selatan_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $selatan_LT_hv += $data5 + $data8 + $data9 + $data10;
                        $selatan_LT_um += $data12 + $data13;
                        //Barat
                        //Barat Kanan
                        $data1 = $data_lalu_lintas->barat_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->barat_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->barat_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->barat_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->barat_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->barat_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->barat_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->barat_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->barat_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->barat_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->barat_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->barat_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->barat_RT[$i]['becak'];

                        $barat_RT_mc += $data11;
                        $barat_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $barat_RT_hv += $data5 + $data8 + $data9 + $data10;
                        $barat_RT_um += $data12 + $data13;

                        //Barat ST
                        $data1 =  $data_lalu_lintas->barat_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->barat_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->barat_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->barat_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->barat_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->barat_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->barat_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->barat_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->barat_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->barat_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->barat_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->barat_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->barat_ST[$i]['becak'];

                        $barat_ST_mc += $data11;
                        $barat_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $barat_ST_hv += $data5 + $data8 + $data9 + $data10;
                        $barat_ST_um += $data12 + $data13;

                        //Barat LT
                        $data1 = $data_lalu_lintas->barat_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->barat_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->barat_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->barat_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->barat_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->barat_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->barat_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->barat_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->barat_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->barat_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->barat_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->barat_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->barat_LT[$i]['becak'];

                        $barat_LT_mc += $data11;
                        $barat_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $barat_LT_hv += $data5 + $data8 + $data9 + $data10;
                        $barat_LT_um += $data12 + $data13;
                    } else {
                    }
                }
            }
            $utara_RT = array(
                'mc' => $utara_RT_mc,
                'lv' => $utara_RT_lv,
                'hv' => $utara_RT_hv,
                'um' => $utara_RT_um
            );
            $utara_RTs[] = $utara_RT;

            //Utara Lurus
            $utara_ST = array(
                'mc' => $utara_ST_mc,
                'lv' => $utara_ST_lv,
                'hv' => $utara_ST_hv,
                'um' => $utara_ST_um
            );
            $utara_STs[] = $utara_ST;

            //Utara Kiri
            $utara_LT = array(
                'mc' => $utara_LT_mc,
                'lv' => $utara_LT_lv,
                'hv' => $utara_LT_hv,
                'um' => $utara_LT_um
            );
            $utara_LTs[] = $utara_LT;

            //Timur     //Timur Kanan
            $timur_RT = array(
                'mc' => $timur_RT_mc,
                'lv' => $timur_RT_lv,
                'hv' => $timur_RT_hv,
                'um' => $timur_RT_um
            );
            $timur_RTs[] = $timur_RT;


            //Timur ST
            $timur_ST = array(
                'mc' => $timur_ST_mc,
                'lv' => $timur_ST_lv,
                'hv' => $timur_ST_hv,
                'um' => $timur_ST_um
            );
            $timur_STs[] = $timur_ST;

            //Timur Kiri
            $timur_LT = array(
                'mc' => $timur_LT_mc,
                'lv' => $timur_LT_lv,
                'hv' => $timur_LT_hv,
                'um' => $timur_LT_um
            );
            $timur_LTs[] = $timur_LT;

            //Selatan            //Selatan Kanan
            $selatan_RT = array(
                'mc' => $selatan_RT_mc,
                'lv' => $selatan_RT_lv,
                'hv' => $selatan_RT_hv,
                'um' => $selatan_RT_um
            );
            $selatan_RTs[] = $selatan_RT;

            //Selatan Lurus1
            $selatan_ST = array(
                'mc' => $selatan_ST_mc,
                'lv' => $selatan_ST_lv,
                'hv' => $selatan_ST_hv,
                'um' => $selatan_ST_um
            );
            $selatan_STs[] = $selatan_ST;

            //Selatan LT
            $selatan_LT = array(
                'mc' => $selatan_LT_mc,
                'lv' => $selatan_LT_lv,
                'hv' => $selatan_LT_hv,
                'um' => $selatan_LT_um
            );
            $selatan_LTs[] = $selatan_LT;

            //Barat         //Barat Kanan
            $barat_RT = array(
                'mc' => $barat_RT_mc,
                'lv' => $barat_RT_lv,
                'hv' => $barat_RT_hv,
                'um' => $barat_RT_um
            );
            $barat_RTs[] = $barat_RT;

            //barat Lurus
            $barat_ST = array(
                'mc' => $barat_ST_mc,
                'lv' => $barat_ST_lv,
                'hv' => $barat_ST_hv,
                'um' => $barat_ST_um
            );
            $barat_STs[] = $barat_ST;

            //barat  LT
            $barat_LT = array(
                'mc' => $barat_LT_mc,
                'lv' => $barat_LT_lv,
                'hv' => $barat_LT_hv,
                'um' => $barat_LT_um
            );
            $barat_LTs[] = $barat_LT;
        }

        return view(
            'simpang4::data_lalu_lintas.identifikasi.kendaraan_per_jam',
            compact(
                'id',
                'data_simpang',
                'jams',
                'utara_RTs',
                'utara_STs',
                'utara_LTs',

                'timur_RTs',
                'timur_STs',
                'timur_LTs',

                'selatan_RTs',
                'selatan_STs',
                'selatan_LTs',

                'barat_RTs',
                'barat_STs',
                'barat_LTs',
            )
        );
    }

    public function smp_per_jam($id)
    {
        $data_lalu_lintas = DataLaluLintas::find($id);
        $id_simpang = $data_lalu_lintas->id_simpang;
        $data_simpang = Simpang4::find($id_simpang);
        $mc = $data_simpang->mc;
        $lv = $data_simpang->lv;
        $hv = $data_simpang->hv;

        $jumlah_data = count($data_lalu_lintas->utara_LT);

        $jams = array();
        $utara_RTs = array();
        $utara_STs = array();
        $utara_LTs = array();

        $timur_RTs = array();
        $timur_STs = array();
        $timur_LTs = array();

        $selatan_RTs = array();
        $selatan_STs = array();
        $selatan_LTs = array();

        $barat_RTs = array();
        $barat_STs = array();
        $barat_LTs = array();
        $totals = array();

        for ($i = 0; $i < $jumlah_data; $i++) {
            $jam_awal = $data_lalu_lintas->utara_LT[$i]['jam_awal'];
            $split_jam_awal = explode('.', $jam_awal);
            $new_jam_akhir = $split_jam_awal[0] + 1;
            if ($new_jam_akhir >= 0 & $new_jam_akhir <= 9) {
                $new_jam_akhir = "0" . $new_jam_akhir;
            }
            $jam_akhir = $new_jam_akhir . '.' . $split_jam_awal[1];
            $new_jam = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir
            );
            $jams[] = $new_jam;
        }

        foreach ($jams as $jam) {
            $jam_awal = $jam['jam_awal'];
            $jam_akhir = $jam['jam_akhir'];

            //Initialization
            $utara_RT_mc = 0;
            $utara_RT_lv = 0;
            $utara_RT_hv = 0;

            $utara_ST_mc = 0;
            $utara_ST_lv = 0;
            $utara_ST_hv = 0;

            $utara_LT_mc = 0;
            $utara_LT_lv = 0;
            $utara_LT_hv = 0;

            //timur
            $timur_RT_mc = 0;
            $timur_RT_lv = 0;
            $timur_RT_hv = 0;

            $timur_ST_mc = 0;
            $timur_ST_lv = 0;
            $timur_ST_hv = 0;

            $timur_LT_mc = 0;
            $timur_LT_lv = 0;
            $timur_LT_hv = 0;
            //selatan
            $selatan_RT_mc = 0;
            $selatan_RT_lv = 0;
            $selatan_RT_hv = 0;

            $selatan_ST_mc = 0;
            $selatan_ST_lv = 0;
            $selatan_ST_hv = 0;

            $selatan_LT_mc = 0;
            $selatan_LT_lv = 0;
            $selatan_LT_hv = 0;
            //barat
            $barat_RT_mc = 0;
            $barat_RT_lv = 0;
            $barat_RT_hv = 0;

            $barat_ST_mc = 0;
            $barat_ST_lv = 0;
            $barat_ST_hv = 0;

            $barat_LT_mc = 0;
            $barat_LT_lv = 0;
            $barat_LT_hv = 0;
            
            for ($i = 0; $i < $jumlah_data; $i++) { 
                $tmp_jam_awal = $data_lalu_lintas->utara_RT[$i]['jam_awal'];
                $tmp_jam_akhir = $data_lalu_lintas->utara_RT[$i]['jam_akhir'];

                if ($tmp_jam_awal >= $jam_awal && $tmp_jam_awal < $jam_akhir) {
                    //utara Kanan1
                    $data1 = $data_lalu_lintas->utara_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->utara_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->utara_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->utara_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->utara_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->utara_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->utara_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->utara_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->utara_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->utara_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->utara_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->utara_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->utara_RT[$i]['becak'];

                    $utara_RT_mc += $data11;
                    $utara_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $utara_RT_hv += $data5 + $data8 + $data9 + $data10;

                    //Utara Lurus
                    $data1 =  $data_lalu_lintas->utara_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->utara_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->utara_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->utara_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->utara_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->utara_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->utara_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->utara_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->utara_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->utara_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->utara_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->utara_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->utara_ST[$i]['becak'];

                    $utara_ST_mc += $data11;
                    $utara_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $utara_ST_hv += $data5 + $data8 + $data9 + $data10;

                    //Utara  Kiri
                    $data1 = $data_lalu_lintas->utara_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->utara_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->utara_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->utara_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->utara_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->utara_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->utara_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->utara_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->utara_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->utara_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->utara_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->utara_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->utara_LT[$i]['becak'];

                    $utara_LT_mc += $data11;
                    $utara_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $utara_LT_hv += $data5 + $data8 + $data9 + $data10;
                    //Timur
                    //Timur Kanan
                    $data1 = $data_lalu_lintas->timur_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->timur_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->timur_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->timur_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->timur_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->timur_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->timur_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->timur_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->timur_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->timur_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->timur_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->timur_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->timur_RT[$i]['becak'];

                    $timur_RT_mc += $data11;
                    $timur_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $timur_RT_hv += $data5 + $data8 + $data9 + $data10;

                    //Timur ST
                    $data1 = $data_lalu_lintas->timur_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->timur_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->timur_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->timur_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->timur_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->timur_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->timur_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->timur_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->timur_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->timur_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->timur_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->timur_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->timur_ST[$i]['becak'];

                    $timur_ST_mc += $data11;
                    $timur_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $timur_ST_hv += $data5 + $data8 + $data9 + $data10;

                    //Timur Kiri
                    $data1 = $data_lalu_lintas->timur_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->timur_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->timur_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->timur_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->timur_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->timur_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->timur_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->timur_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->timur_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->timur_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->timur_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->timur_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->timur_LT[$i]['becak'];

                    $timur_LT_mc += $data11;
                    $timur_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $timur_LT_hv += $data5 + $data8 + $data9 + $data10;
                    //Selatan
                    //Selatan Kanan
                    $data1 = $data_lalu_lintas->selatan_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->selatan_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->selatan_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->selatan_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->selatan_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->selatan_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->selatan_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->selatan_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->selatan_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->selatan_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->selatan_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->selatan_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->selatan_RT[$i]['becak'];

                    $selatan_RT_mc += $data11;
                    $selatan_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $selatan_RT_hv += $data5 + $data8 + $data9 + $data10;

                    //Selatan Lurus1
                    $data1 = $data_lalu_lintas->selatan_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->selatan_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->selatan_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->selatan_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->selatan_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->selatan_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->selatan_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->selatan_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->selatan_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->selatan_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->selatan_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->selatan_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->selatan_ST[$i]['becak'];

                    $selatan_ST_mc += $data11;
                    $selatan_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $selatan_ST_hv += $data5 + $data8 + $data9 + $data10;

                    //Selatan LT
                    $data1 = $data_lalu_lintas->selatan_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->selatan_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->selatan_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->selatan_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->selatan_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->selatan_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->selatan_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->selatan_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->selatan_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->selatan_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->selatan_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->selatan_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->selatan_LT[$i]['becak'];

                    $selatan_LT_mc += $data11;
                    $selatan_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $selatan_LT_hv += $data5 + $data8 + $data9 + $data10;
                    //Barat
                    //Barat Kanan
                    $data1 = $data_lalu_lintas->barat_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->barat_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->barat_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->barat_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->barat_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->barat_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->barat_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->barat_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->barat_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->barat_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->barat_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->barat_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->barat_RT[$i]['becak'];

                    $barat_RT_mc += $data11;
                    $barat_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $barat_RT_hv += $data5 + $data8 + $data9 + $data10;

                    //Barat ST
                    $data1 =  $data_lalu_lintas->barat_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->barat_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->barat_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->barat_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->barat_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->barat_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->barat_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->barat_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->barat_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->barat_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->barat_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->barat_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->barat_ST[$i]['becak'];

                    $barat_ST_mc += $data11;
                    $barat_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $barat_ST_hv += $data5 + $data8 + $data9 + $data10;

                    //Barat LT
                    $data1 = $data_lalu_lintas->barat_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->barat_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->barat_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->barat_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->barat_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->barat_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->barat_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->barat_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->barat_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->barat_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->barat_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->barat_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->barat_LT[$i]['becak'];

                    $barat_LT_mc += $data11;
                    $barat_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $barat_LT_hv += $data5 + $data8 + $data9 + $data10;
                }
            }

            if ($jam_awal > 23.00) {
                $jam_awal = $jam_awal - 24.05;
                $jam_akhir = $jam_akhir - 24.05;
                for ($i = 0; $i < $jumlah_data; $i++) {
                    $tmp_jam_awal = $data_lalu_lintas->utara_RT[$i]['jam_awal'];
                    $tmp_jam_akhir = $data_lalu_lintas->utara_RT[$i]['jam_akhir'];
                    if ($tmp_jam_awal >= $jam_awal && $tmp_jam_awal < $jam_akhir) {
                        //utara Kanan1
                        $data1 = $data_lalu_lintas->utara_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->utara_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->utara_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->utara_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->utara_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->utara_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->utara_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->utara_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->utara_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->utara_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->utara_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->utara_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->utara_RT[$i]['becak'];

                        $utara_RT_mc += $data11;
                        $utara_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $utara_RT_hv += $data5 + $data8 + $data9 + $data10;

                        //Utara Lurus
                        $data1 =  $data_lalu_lintas->utara_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->utara_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->utara_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->utara_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->utara_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->utara_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->utara_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->utara_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->utara_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->utara_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->utara_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->utara_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->utara_ST[$i]['becak'];

                        $utara_ST_mc += $data11;
                        $utara_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $utara_ST_hv += $data5 + $data8 + $data9 + $data10;

                        //Utara  Kiri
                        $data1 = $data_lalu_lintas->utara_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->utara_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->utara_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->utara_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->utara_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->utara_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->utara_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->utara_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->utara_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->utara_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->utara_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->utara_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->utara_LT[$i]['becak'];

                        $utara_LT_mc += $data11;
                        $utara_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $utara_LT_hv += $data5 + $data8 + $data9 + $data10;
                        //Timur
                        //Timur Kanan
                        $data1 = $data_lalu_lintas->timur_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->timur_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->timur_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->timur_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->timur_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->timur_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->timur_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->timur_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->timur_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->timur_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->timur_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->timur_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->timur_RT[$i]['becak'];

                        $timur_RT_mc += $data11;
                        $timur_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $timur_RT_hv += $data5 + $data8 + $data9 + $data10;

                        //Timur ST
                        $data1 = $data_lalu_lintas->timur_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->timur_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->timur_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->timur_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->timur_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->timur_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->timur_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->timur_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->timur_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->timur_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->timur_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->timur_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->timur_ST[$i]['becak'];

                        $timur_ST_mc += $data11;
                        $timur_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $timur_ST_hv += $data5 + $data8 + $data9 + $data10;

                        //Timur Kiri
                        $data1 = $data_lalu_lintas->timur_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->timur_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->timur_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->timur_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->timur_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->timur_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->timur_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->timur_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->timur_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->timur_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->timur_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->timur_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->timur_LT[$i]['becak'];

                        $timur_LT_mc += $data11;
                        $timur_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $timur_LT_hv += $data5 + $data8 + $data9 + $data10;
                        //Selatan
                        //Selatan Kanan
                        $data1 = $data_lalu_lintas->selatan_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->selatan_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->selatan_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->selatan_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->selatan_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->selatan_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->selatan_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->selatan_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->selatan_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->selatan_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->selatan_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->selatan_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->selatan_RT[$i]['becak'];

                        $selatan_RT_mc += $data11;
                        $selatan_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $selatan_RT_hv += $data5 + $data8 + $data9 + $data10;

                        //Selatan Lurus1
                        $data1 = $data_lalu_lintas->selatan_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->selatan_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->selatan_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->selatan_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->selatan_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->selatan_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->selatan_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->selatan_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->selatan_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->selatan_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->selatan_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->selatan_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->selatan_ST[$i]['becak'];

                        $selatan_ST_mc += $data11;
                        $selatan_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $selatan_ST_hv += $data5 + $data8 + $data9 + $data10;

                        //Selatan LT
                        $data1 = $data_lalu_lintas->selatan_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->selatan_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->selatan_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->selatan_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->selatan_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->selatan_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->selatan_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->selatan_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->selatan_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->selatan_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->selatan_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->selatan_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->selatan_LT[$i]['becak'];

                        $selatan_LT_mc += $data11;
                        $selatan_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $selatan_LT_hv += $data5 + $data8 + $data9 + $data10;
                        //Barat
                        //Barat Kanan
                        $data1 = $data_lalu_lintas->barat_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->barat_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->barat_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->barat_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->barat_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->barat_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->barat_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->barat_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->barat_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->barat_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->barat_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->barat_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->barat_RT[$i]['becak'];

                        $barat_RT_mc += $data11;
                        $barat_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $barat_RT_hv += $data5 + $data8 + $data9 + $data10;

                        //Barat ST
                        $data1 =  $data_lalu_lintas->barat_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->barat_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->barat_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->barat_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->barat_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->barat_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->barat_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->barat_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->barat_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->barat_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->barat_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->barat_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->barat_ST[$i]['becak'];

                        $barat_ST_mc += $data11;
                        $barat_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $barat_ST_hv += $data5 + $data8 + $data9 + $data10;

                        //Barat LT
                        $data1 = $data_lalu_lintas->barat_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->barat_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->barat_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->barat_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->barat_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->barat_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->barat_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->barat_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->barat_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->barat_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->barat_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->barat_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->barat_LT[$i]['becak'];

                        $barat_LT_mc += $data11;
                        $barat_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $barat_LT_hv += $data5 + $data8 + $data9 + $data10;
                    } else {
                    }
                }
            }


            //Make Array & Push
            //Utara     //Utara RT
            $utara_RT_mc *= $mc;
            $utara_RT_lv *= $lv;
            $utara_RT_hv *= $hv;
            $utara_RT_total = $utara_RT_mc + $utara_RT_lv + $utara_RT_hv;
            $utara_RT = array(
                'mc' => $utara_RT_mc,
                'lv' => $utara_RT_lv,
                'hv' => $utara_RT_hv
            );
            $utara_RTs[] = $utara_RT;

            //Utara Lurus
            $utara_ST_mc *= $mc;
            $utara_ST_lv *= $lv;
            $utara_ST_hv *= $hv;
            $utara_ST_total = $utara_ST_mc + $utara_ST_lv + $utara_ST_hv;
            $utara_ST = array(
                'mc' => $utara_ST_mc,
                'lv' => $utara_ST_lv,
                'hv' => $utara_ST_hv
            );
            $utara_STs[] = $utara_ST;

            //Utara Kiri
            $utara_LT_mc *= $mc;
            $utara_LT_lv *= $lv;
            $utara_LT_hv *= $hv;
            $utara_LT_total = $utara_LT_mc + $utara_LT_lv + $utara_LT_hv;
            $utara_LT = array(
                'mc' => $utara_LT_mc,
                'lv' => $utara_LT_lv,
                'hv' => $utara_LT_hv
            );
            $utara_LTs[] = $utara_LT;

            //Timur     //Timur Kanan
            $timur_RT_mc *= $mc;
            $timur_RT_lv *= $lv;
            $timur_RT_hv *= $hv;
            $timur_RT_total = $timur_RT_mc + $timur_RT_lv + $timur_RT_hv;
            $timur_RT = array(
                'mc' => $timur_RT_mc,
                'lv' => $timur_RT_lv,
                'hv' => $timur_RT_hv
            );
            $timur_RTs[] = $timur_RT;

            //Timur Lurus1
            $timur_ST_mc *= $mc;
            $timur_ST_lv *= $lv;
            $timur_ST_hv *= $hv;
            $timur_ST_total = $timur_ST_mc + $timur_ST_lv + $timur_ST_hv;
            $timur_ST = array(
                'mc' => $timur_ST_mc,
                'lv' => $timur_ST_lv,
                'hv' => $timur_ST_hv
            );
            $timur_STs[] = $timur_ST;

            //Timur Kiri
            $timur_LT_mc *= $mc;
            $timur_LT_lv *= $lv;
            $timur_LT_hv *= $hv;
            $timur_LT_total = $timur_LT_mc + $timur_LT_lv + $timur_LT_hv;
            $timur_LT = array(
                'mc' => $timur_LT_mc,
                'lv' => $timur_LT_lv,
                'hv' => $timur_LT_hv
            );
            $timur_LTs[] = $timur_LT;

            //Selatan           //Selatan Kanan
            $selatan_RT_mc *= $mc;
            $selatan_RT_lv *= $lv;
            $selatan_RT_hv *= $hv;
            $selatan_RT_total = $selatan_RT_mc + $selatan_RT_lv + $selatan_RT_hv;
            $selatan_RT = array(
                'mc' => $selatan_RT_mc,
                'lv' => $selatan_RT_lv,
                'hv' => $selatan_RT_hv
            );
            $selatan_RTs[] = $selatan_RT;

            //Selatan Lurus1
            $selatan_ST_mc *= $mc;
            $selatan_ST_lv *= $lv;
            $selatan_ST_hv *= $hv;
            $selatan_ST_total = $selatan_ST_mc + $selatan_ST_lv + $selatan_ST_hv;
            $selatan_ST = array(
                'mc' => $selatan_ST_mc,
                'lv' => $selatan_ST_lv,
                'hv' => $selatan_ST_hv
            );
            $selatan_STs[] = $selatan_ST;

            //Selatan Kiri
            $selatan_LT_mc *= $mc;
            $selatan_LT_lv *= $lv;
            $selatan_LT_hv *= $hv;
            $selatan_LT_total = $selatan_LT_mc + $selatan_LT_lv + $selatan_LT_hv;
            $selatan_LT = array(
                'mc' => $selatan_LT_mc,
                'lv' => $selatan_LT_lv,
                'hv' => $selatan_LT_hv
            );
            $selatan_LTs[] = $selatan_LT;

            //Barat   //Barat Kanan
            $barat_RT_mc *= $mc;
            $barat_RT_lv *= $lv;
            $barat_RT_hv *= $hv;
            $barat_RT_total = $barat_RT_mc + $barat_RT_lv + $barat_RT_hv;
            $barat_RT = array(
                'mc' => $barat_RT_mc,
                'lv' => $barat_RT_lv,
                'hv' => $barat_RT_hv
            );
            $barat_RTs[] = $barat_RT;

            //barat ST
            $barat_ST_mc *= $mc;
            $barat_ST_lv *= $lv;
            $barat_ST_hv *= $hv;
            $barat_ST_total = $barat_ST_mc + $barat_ST_lv + $barat_ST_hv;
            $barat_ST = array(
                'mc' => $barat_ST_mc,
                'lv' => $barat_ST_lv,
                'hv' => $barat_ST_hv
            );
            $barat_STs[] = $barat_ST;

            //Barat LT
            $barat_LT_mc *= $mc;
            $barat_LT_lv *= $lv;
            $barat_LT_hv *= $hv;
            $barat_LT_total = $barat_LT_mc + $barat_LT_lv + $barat_LT_hv;
            $barat_LT = array(
                'mc' => $barat_LT_mc,
                'lv' => $barat_LT_lv,
                'hv' => $barat_LT_hv
            );
            $barat_LTs[] = $barat_LT;

            //Total
            $total_utara = $utara_RT_total + $utara_ST_total + $utara_LT_total;
            $total_timur = $timur_RT_total + $timur_ST_total + $timur_LT_total;
            $total_selatan = $selatan_RT_total + $selatan_ST_total + $selatan_LT_total;
            $total_barat = $barat_RT_total + $barat_ST_total + $barat_LT_total;
            $grand_total = $utara_RT_total + $utara_ST_total + $utara_LT_total +
                $timur_RT_total + $timur_ST_total + $timur_LT_total +
                $selatan_RT_total + $selatan_ST_total + $selatan_LT_total +
                $barat_RT_total + $barat_ST_total + $barat_LT_total;
            $total = array(
                'total_utara' => $total_utara,
                'total_timur' => $total_timur,
                'total_selatan' => $total_selatan,
                'total_barat' => $total_barat,
                'grand_total' => $grand_total
            );
            $totals[] = $total;
            // echo "<br>";
        }

        return view(
            'simpang4::data_lalu_lintas.identifikasi.smp_per_jam',
            compact(
                'id',
                'data_simpang',
                'jams',
                'utara_RTs',
                'utara_STs',
                'utara_LTs',
                'timur_RTs',
                'timur_STs',
                'timur_LTs',
                'selatan_RTs',
                'selatan_STs',
                'selatan_LTs',
                'barat_RTs',
                'barat_STs',
                'barat_LTs',
                'totals'
            )
        );
    }

    public function fluktasi_lalu_lintas($id)
    {
        $data_lalu_lintas = DataLaluLintas::find($id);
        $id_simpang = $data_lalu_lintas->id_simpang;
        $data_simpang = Simpang4::find($id_simpang);
        $mc = $data_simpang->mc;
        $lv = $data_simpang->lv;
        $hv = $data_simpang->hv;

        $jumlah_data = count($data_lalu_lintas->utara_LT);
        $looping_max = $jumlah_data - 5;

        $jams = array();

        $utara_RTs = array();
        $utara_STs = array();
        $utara_LTs = array();

        $timur_RTs = array();
        $timur_STs = array();
        $timur_LTs = array();

        $selatan_RTs = array();
        $selatan_STs = array();
        $selatan_LTs = array();

        $barat_RTs = array();
        $barat_STs = array();
        $barat_LTs = array();

        $barat_laut_RTs = array();
        $barat_laut_STs = array();
        $barat_laut_LTs = array();

        $totals = array();

        for ($i = 0; $i < $looping_max; $i++) {
            $jam_awal = $data_lalu_lintas->utara_LT[$i]['jam_awal'];
            $split_jam_awal = explode('.', $jam_awal);
            $new_jam_akhir = $split_jam_awal[0] + 1;
            if ($new_jam_akhir >= 0 & $new_jam_akhir <= 9) {
                $new_jam_akhir = "0" . $new_jam_akhir;
            }
            $jam_akhir = $new_jam_akhir . '.' . $split_jam_awal[1];
            $new_jam = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir
            );
            $jams[] = $new_jam;
        }

        foreach ($jams as $jam) {
            $jam_awal = $jam['jam_awal'];
            $jam_akhir = $jam['jam_akhir'];

            //Initialization
            //utara
            $utara_RT_mc = 0;
            $utara_RT_lv = 0;
            $utara_RT_hv = 0;
            $utara_RT_um = 0;

            $utara_ST_mc = 0;
            $utara_ST_lv = 0;
            $utara_ST_hv = 0;
            $utara_ST_um = 0;

            $utara_LT_mc = 0;
            $utara_LT_lv = 0;
            $utara_LT_hv = 0;
            $utara_LT_um = 0;

            //timur
            $timur_RT_mc = 0;
            $timur_RT_lv = 0;
            $timur_RT_hv = 0;
            $timur_RT_um = 0;

            $timur_ST_mc = 0;
            $timur_ST_lv = 0;
            $timur_ST_hv = 0;
            $timur_ST_um = 0;

            $timur_LT_mc = 0;
            $timur_LT_lv = 0;
            $timur_LT_hv = 0;
            $timur_LT_um = 0;
            //selatan
            $selatan_RT_mc = 0;
            $selatan_RT_lv = 0;
            $selatan_RT_hv = 0;
            $selatan_RT_um = 0;

            $selatan_ST_mc = 0;
            $selatan_ST_lv = 0;
            $selatan_ST_hv = 0;
            $selatan_ST_um = 0;

            $selatan_LT_mc = 0;
            $selatan_LT_lv = 0;
            $selatan_LT_hv = 0;
            $selatan_LT_um = 0;
            //barat
            $barat_RT_mc = 0;
            $barat_RT_lv = 0;
            $barat_RT_hv = 0;
            $barat_RT_um = 0;

            $barat_ST_mc = 0;
            $barat_ST_lv = 0;
            $barat_ST_hv = 0;
            $barat_ST_um = 0;

            $barat_LT_mc = 0;
            $barat_LT_lv = 0;
            $barat_LT_hv = 0;
            $barat_LT_um = 0;

            for ($i = 0; $i < $jumlah_data; $i++) {
                $tmp_jam_awal = $data_lalu_lintas->utara_RT[$i]['jam_awal'];
                $tmp_jam_akhir = $data_lalu_lintas->utara_RT[$i]['jam_akhir'];

                if ($tmp_jam_awal >= $jam_awal && $tmp_jam_awal < $jam_akhir) {
                    //Utara                    
                    //utara Kanan1
                    $data1 = $data_lalu_lintas->utara_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->utara_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->utara_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->utara_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->utara_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->utara_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->utara_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->utara_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->utara_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->utara_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->utara_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->utara_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->utara_RT[$i]['becak'];

                    $utara_RT_mc += $data11;
                    $utara_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $utara_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $utara_RT_um += $data12 + $data13;

                    //Utara Lurus
                    $data1 =  $data_lalu_lintas->utara_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->utara_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->utara_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->utara_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->utara_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->utara_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->utara_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->utara_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->utara_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->utara_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->utara_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->utara_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->utara_ST[$i]['becak'];

                    $utara_ST_mc += $data11;
                    $utara_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $utara_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $utara_ST_um += $data12 + $data13;

                    //Utara  Kiri
                    $data1 = $data_lalu_lintas->utara_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->utara_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->utara_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->utara_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->utara_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->utara_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->utara_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->utara_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->utara_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->utara_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->utara_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->utara_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->utara_LT[$i]['becak'];

                    $utara_LT_mc += $data11;
                    $utara_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $utara_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $utara_LT_um += $data12 + $data13;
                    //Timur
                    //Timur Kanan
                    $data1 = $data_lalu_lintas->timur_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->timur_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->timur_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->timur_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->timur_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->timur_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->timur_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->timur_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->timur_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->timur_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->timur_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->timur_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->timur_RT[$i]['becak'];

                    $timur_RT_mc += $data11;
                    $timur_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $timur_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $timur_RT_um += $data12 + $data13;

                    //Timur ST
                    $data1 = $data_lalu_lintas->timur_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->timur_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->timur_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->timur_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->timur_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->timur_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->timur_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->timur_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->timur_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->timur_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->timur_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->timur_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->timur_ST[$i]['becak'];

                    $timur_ST_mc += $data11;
                    $timur_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $timur_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $timur_ST_um += $data12 + $data13;

                    //Timur Kiri
                    $data1 = $data_lalu_lintas->timur_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->timur_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->timur_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->timur_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->timur_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->timur_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->timur_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->timur_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->timur_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->timur_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->timur_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->timur_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->timur_LT[$i]['becak'];

                    $timur_LT_mc += $data11;
                    $timur_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $timur_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $timur_LT_um += $data12 + $data13;
                    //Selatan
                    //Selatan Kanan
                    $data1 = $data_lalu_lintas->selatan_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->selatan_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->selatan_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->selatan_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->selatan_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->selatan_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->selatan_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->selatan_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->selatan_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->selatan_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->selatan_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->selatan_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->selatan_RT[$i]['becak'];

                    $selatan_RT_mc += $data11;
                    $selatan_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $selatan_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $selatan_RT_um += $data12 + $data13;

                    //Selatan Lurus1
                    $data1 = $data_lalu_lintas->selatan_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->selatan_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->selatan_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->selatan_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->selatan_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->selatan_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->selatan_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->selatan_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->selatan_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->selatan_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->selatan_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->selatan_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->selatan_ST[$i]['becak'];

                    $selatan_ST_mc += $data11;
                    $selatan_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $selatan_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $selatan_ST_um += $data12 + $data13;

                    //Selatan LT
                    $data1 = $data_lalu_lintas->selatan_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->selatan_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->selatan_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->selatan_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->selatan_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->selatan_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->selatan_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->selatan_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->selatan_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->selatan_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->selatan_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->selatan_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->selatan_LT[$i]['becak'];

                    $selatan_LT_mc += $data11;
                    $selatan_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $selatan_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $selatan_LT_um += $data12 + $data13;
                    //Barat
                    //Barat Kanan
                    $data1 = $data_lalu_lintas->barat_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->barat_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->barat_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->barat_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->barat_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->barat_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->barat_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->barat_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->barat_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->barat_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->barat_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->barat_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->barat_RT[$i]['becak'];

                    $barat_RT_mc += $data11;
                    $barat_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $barat_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $barat_RT_um += $data12 + $data13;

                    //Barat ST
                    $data1 =  $data_lalu_lintas->barat_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->barat_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->barat_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->barat_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->barat_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->barat_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->barat_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->barat_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->barat_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->barat_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->barat_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->barat_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->barat_ST[$i]['becak'];

                    $barat_ST_mc += $data11;
                    $barat_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $barat_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $barat_ST_um += $data12 + $data13;

                    //Barat LT
                    $data1 = $data_lalu_lintas->barat_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->barat_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->barat_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->barat_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->barat_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->barat_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->barat_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->barat_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->barat_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->barat_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->barat_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->barat_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->barat_LT[$i]['becak'];

                    $barat_LT_mc += $data11;
                    $barat_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $barat_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $barat_LT_um += $data12 + $data13;
                } else {

                }
            }

            // Loop Tambahan
            if ($jam_awal > 23.00) {
                $jam_awal = $jam_awal - 24.05;
                $jam_akhir = $jam_akhir - 24.05;
                for ($i = 0; $i < $jumlah_data; $i++) {
                    $tmp_jam_awal = $data_lalu_lintas->utara_RT[$i]['jam_awal'];
                    $tmp_jam_akhir = $data_lalu_lintas->utara_RT[$i]['jam_akhir'];
                    
                    if ($tmp_jam_awal >= $jam_awal && $tmp_jam_awal < $jam_akhir) {
                        //Utara                    
                        //utara Kanan1
                        $data1 = $data_lalu_lintas->utara_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->utara_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->utara_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->utara_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->utara_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->utara_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->utara_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->utara_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->utara_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->utara_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->utara_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->utara_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->utara_RT[$i]['becak'];

                        $utara_RT_mc += $data11;
                        $utara_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $utara_RT_hv += $data5 + $data8 + $data9 + $data10;
                        $utara_RT_um += $data12 + $data13;

                        //Utara Lurus
                        $data1 =  $data_lalu_lintas->utara_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->utara_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->utara_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->utara_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->utara_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->utara_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->utara_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->utara_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->utara_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->utara_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->utara_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->utara_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->utara_ST[$i]['becak'];

                        $utara_ST_mc += $data11;
                        $utara_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $utara_ST_hv += $data5 + $data8 + $data9 + $data10;
                        $utara_ST_um += $data12 + $data13;

                        //Utara  Kiri
                        $data1 = $data_lalu_lintas->utara_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->utara_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->utara_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->utara_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->utara_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->utara_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->utara_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->utara_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->utara_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->utara_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->utara_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->utara_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->utara_LT[$i]['becak'];

                        $utara_LT_mc += $data11;
                        $utara_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $utara_LT_hv += $data5 + $data8 + $data9 + $data10;
                        $utara_LT_um += $data12 + $data13;
                        //Timur
                        //Timur Kanan
                        $data1 = $data_lalu_lintas->timur_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->timur_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->timur_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->timur_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->timur_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->timur_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->timur_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->timur_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->timur_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->timur_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->timur_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->timur_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->timur_RT[$i]['becak'];

                        $timur_RT_mc += $data11;
                        $timur_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $timur_RT_hv += $data5 + $data8 + $data9 + $data10;
                        $timur_RT_um += $data12 + $data13;

                        //Timur ST
                        $data1 = $data_lalu_lintas->timur_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->timur_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->timur_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->timur_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->timur_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->timur_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->timur_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->timur_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->timur_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->timur_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->timur_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->timur_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->timur_ST[$i]['becak'];

                        $timur_ST_mc += $data11;
                        $timur_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $timur_ST_hv += $data5 + $data8 + $data9 + $data10;
                        $timur_ST_um += $data12 + $data13;

                        //Timur Kiri
                        $data1 = $data_lalu_lintas->timur_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->timur_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->timur_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->timur_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->timur_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->timur_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->timur_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->timur_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->timur_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->timur_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->timur_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->timur_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->timur_LT[$i]['becak'];

                        $timur_LT_mc += $data11;
                        $timur_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $timur_LT_hv += $data5 + $data8 + $data9 + $data10;
                        $timur_LT_um += $data12 + $data13;
                        //Selatan
                        //Selatan Kanan
                        $data1 = $data_lalu_lintas->selatan_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->selatan_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->selatan_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->selatan_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->selatan_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->selatan_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->selatan_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->selatan_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->selatan_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->selatan_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->selatan_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->selatan_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->selatan_RT[$i]['becak'];

                        $selatan_RT_mc += $data11;
                        $selatan_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $selatan_RT_hv += $data5 + $data8 + $data9 + $data10;
                        $selatan_RT_um += $data12 + $data13;

                        //Selatan Lurus1
                        $data1 = $data_lalu_lintas->selatan_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->selatan_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->selatan_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->selatan_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->selatan_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->selatan_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->selatan_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->selatan_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->selatan_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->selatan_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->selatan_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->selatan_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->selatan_ST[$i]['becak'];

                        $selatan_ST_mc += $data11;
                        $selatan_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $selatan_ST_hv += $data5 + $data8 + $data9 + $data10;
                        $selatan_ST_um += $data12 + $data13;

                        //Selatan LT
                        $data1 = $data_lalu_lintas->selatan_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->selatan_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->selatan_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->selatan_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->selatan_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->selatan_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->selatan_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->selatan_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->selatan_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->selatan_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->selatan_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->selatan_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->selatan_LT[$i]['becak'];

                        $selatan_LT_mc += $data11;
                        $selatan_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $selatan_LT_hv += $data5 + $data8 + $data9 + $data10;
                        $selatan_LT_um += $data12 + $data13;
                        //Barat
                        //Barat Kanan
                        $data1 = $data_lalu_lintas->barat_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->barat_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->barat_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->barat_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->barat_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->barat_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->barat_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->barat_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->barat_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->barat_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->barat_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->barat_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->barat_RT[$i]['becak'];

                        $barat_RT_mc += $data11;
                        $barat_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $barat_RT_hv += $data5 + $data8 + $data9 + $data10;
                        $barat_RT_um += $data12 + $data13;

                        //Barat ST
                        $data1 =  $data_lalu_lintas->barat_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->barat_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->barat_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->barat_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->barat_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->barat_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->barat_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->barat_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->barat_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->barat_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->barat_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->barat_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->barat_ST[$i]['becak'];

                        $barat_ST_mc += $data11;
                        $barat_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $barat_ST_hv += $data5 + $data8 + $data9 + $data10;
                        $barat_ST_um += $data12 + $data13;

                        //Barat LT
                        $data1 = $data_lalu_lintas->barat_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->barat_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->barat_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->barat_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->barat_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->barat_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->barat_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->barat_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->barat_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->barat_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->barat_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->barat_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->barat_LT[$i]['becak'];

                        $barat_LT_mc += $data11;
                        $barat_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $barat_LT_hv += $data5 + $data8 + $data9 + $data10;
                        $barat_LT_um += $data12 + $data13;
                    } else {

                    }
                }
            }
            //Make Array & Push
            //Utara     //Utara RT
            $utara_RT_mc *= $mc;
            $utara_RT_lv *= $lv;
            $utara_RT_hv *= $hv;
            $utara_RT_total = $utara_RT_mc + $utara_RT_lv + $utara_RT_hv;
            $utara_RT = array(
                'mc' => $utara_RT_mc,
                'lv' => $utara_RT_lv,
                'hv' => $utara_RT_hv
            );
            $utara_RTs[] = $utara_RT;

            //Utara Lurus
            $utara_ST_mc *= $mc;
            $utara_ST_lv *= $lv;
            $utara_ST_hv *= $hv;
            $utara_ST_total = $utara_ST_mc + $utara_ST_lv + $utara_ST_hv;
            $utara_ST = array(
                'mc' => $utara_ST_mc,
                'lv' => $utara_ST_lv,
                'hv' => $utara_ST_hv
            );
            $utara_STs[] = $utara_ST;

            //Utara Kiri
            $utara_LT_mc *= $mc;
            $utara_LT_lv *= $lv;
            $utara_LT_hv *= $hv;
            $utara_LT_total = $utara_LT_mc + $utara_LT_lv + $utara_LT_hv;
            $utara_LT = array(
                'mc' => $utara_LT_mc,
                'lv' => $utara_LT_lv,
                'hv' => $utara_LT_hv
            );
            $utara_LTs[] = $utara_LT;

            //Timur     //Timur Kanan
            $timur_RT_mc *= $mc;
            $timur_RT_lv *= $lv;
            $timur_RT_hv *= $hv;
            $timur_RT_total = $timur_RT_mc + $timur_RT_lv + $timur_RT_hv;
            $timur_RT = array(
                'mc' => $timur_RT_mc,
                'lv' => $timur_RT_lv,
                'hv' => $timur_RT_hv
            );
            $timur_RTs[] = $timur_RT;

            //Timur Lurus1
            $timur_ST_mc *= $mc;
            $timur_ST_lv *= $lv;
            $timur_ST_hv *= $hv;
            $timur_ST_total = $timur_ST_mc + $timur_ST_lv + $timur_ST_hv;
            $timur_ST = array(
                'mc' => $timur_ST_mc,
                'lv' => $timur_ST_lv,
                'hv' => $timur_ST_hv
            );
            $timur_STs[] = $timur_ST;

            //Timur Kiri
            $timur_LT_mc *= $mc;
            $timur_LT_lv *= $lv;
            $timur_LT_hv *= $hv;
            $timur_LT_total = $timur_LT_mc + $timur_LT_lv + $timur_LT_hv;
            $timur_LT = array(
                'mc' => $timur_LT_mc,
                'lv' => $timur_LT_lv,
                'hv' => $timur_LT_hv
            );
            $timur_LTs[] = $timur_LT;

            //Selatan           //Selatan Kanan
            $selatan_RT_mc *= $mc;
            $selatan_RT_lv *= $lv;
            $selatan_RT_hv *= $hv;
            $selatan_RT_total = $selatan_RT_mc + $selatan_RT_lv + $selatan_RT_hv;
            $selatan_RT = array(
                'mc' => $selatan_RT_mc,
                'lv' => $selatan_RT_lv,
                'hv' => $selatan_RT_hv
            );
            $selatan_RTs[] = $selatan_RT;

            //Selatan Lurus1
            $selatan_ST_mc *= $mc;
            $selatan_ST_lv *= $lv;
            $selatan_ST_hv *= $hv;
            $selatan_ST_total = $selatan_ST_mc + $selatan_ST_lv + $selatan_ST_hv;
            $selatan_ST = array(
                'mc' => $selatan_ST_mc,
                'lv' => $selatan_ST_lv,
                'hv' => $selatan_ST_hv
            );
            $selatan_STs[] = $selatan_ST;

            //Selatan Kiri
            $selatan_LT_mc *= $mc;
            $selatan_LT_lv *= $lv;
            $selatan_LT_hv *= $hv;
            $selatan_LT_total = $selatan_LT_mc + $selatan_LT_lv + $selatan_LT_hv;
            $selatan_LT = array(
                'mc' => $selatan_LT_mc,
                'lv' => $selatan_LT_lv,
                'hv' => $selatan_LT_hv
            );
            $selatan_LTs[] = $selatan_LT;

            //Barat   //Barat Kanan
            $barat_RT_mc *= $mc;
            $barat_RT_lv *= $lv;
            $barat_RT_hv *= $hv;
            $barat_RT_total = $barat_RT_mc + $barat_RT_lv + $barat_RT_hv;
            $barat_RT = array(
                'mc' => $barat_RT_mc,
                'lv' => $barat_RT_lv,
                'hv' => $barat_RT_hv
            );
            $barat_RTs[] = $barat_RT;

            //barat ST
            $barat_ST_mc *= $mc;
            $barat_ST_lv *= $lv;
            $barat_ST_hv *= $hv;
            $barat_ST_total = $barat_ST_mc + $barat_ST_lv + $barat_ST_hv;
            $barat_ST = array(
                'mc' => $barat_ST_mc,
                'lv' => $barat_ST_lv,
                'hv' => $barat_ST_hv
            );
            $barat_STs[] = $barat_ST;

            //Barat LT
            $barat_LT_mc *= $mc;
            $barat_LT_lv *= $lv;
            $barat_LT_hv *= $hv;
            $barat_LT_total = $barat_LT_mc + $barat_LT_lv + $barat_LT_hv;
            $barat_LT = array(
                'mc' => $barat_LT_mc,
                'lv' => $barat_LT_lv,
                'hv' => $barat_LT_hv
            );
            $barat_LTs[] = $barat_LT;

            //Total
            $total_utara = $utara_RT_total + $utara_ST_total + $utara_LT_total;
            $total_timur = $timur_RT_total + $timur_ST_total + $timur_LT_total;
            $total_selatan = $selatan_RT_total + $selatan_ST_total + $selatan_LT_total;
            $total_barat = $barat_RT_total + $barat_ST_total + $barat_LT_total;
            $grand_total = $utara_RT_total + $utara_ST_total + $utara_LT_total +
                $timur_RT_total + $timur_ST_total + $timur_LT_total +
                $selatan_RT_total + $selatan_ST_total + $selatan_LT_total +
                $barat_RT_total + $barat_ST_total + $barat_LT_total;
            $total = array(
                'total_utara' => $total_utara,
                'total_timur' => $total_timur,
                'total_selatan' => $total_selatan,
                'total_barat' => $total_barat,
                'grand_total' => $grand_total
            );
            $totals[] = $total;
        }

        return view(
            'simpang4::data_lalu_lintas.identifikasi.fluktasi_lalu_lintas',
            compact(
                'id',
                'data_simpang',
                'jams',
                'totals'
            )
        );
    }

    public function komposisi_kendaraan($id)
    {
        $data_lalu_lintas = DataLaluLintas::find($id);
        $id_simpang = $data_lalu_lintas->id_simpang;
        $data_simpang = Simpang4::find($id_simpang);

        $total_table = array();
        $total_chart = array();
        $total_data = 0;
        $total_data1 = 0;
        $total_data2 = 0;
        $total_data3 = 0;
        $total_data4 = 0;
        $total_data5 = 0;
        $total_data6 = 0;
        $total_data7 = 0;
        $total_data8 = 0;
        $total_data9 = 0;
        $total_data10 = 0;
        $total_data11 = 0;
        $total_data12 = 0;
        $total_data13 = 0;

        //Utara RT
        if (isset($data_lalu_lintas->utara_RT)) {
            foreach ($data_lalu_lintas->utara_RT as $key => $i) {
                //Total Seluruh Data
                $total_data += $i['kendaraan_roda_tiga'];
                $total_data += $i['sedan'];
                $total_data += $i['oplet'];
                $total_data += $i['micro_bus'];
                $total_data += $i['bus'];
                $total_data += $i['pick_up'];
                $total_data += $i['micro_truck'];
                $total_data += $i['truck_as_2'];
                $total_data += $i['truck_as_3'];
                $total_data += $i['mobil_tempel_atau_semi_trailer'];
                $total_data += $i['sepeda_motor'];
                $total_data += $i['sepeda'];
                $total_data += $i['becak'];

                //Total Per Jenis Kendaraan
                $total_data1 += $i['kendaraan_roda_tiga'];
                $total_data2 += $i['sedan'];
                $total_data3 += $i['oplet'];
                $total_data4 += $i['micro_bus'];
                $total_data5 += $i['bus'];
                $total_data6 += $i['pick_up'];
                $total_data7 += $i['micro_truck'];
                $total_data8 += $i['truck_as_2'];
                $total_data9 += $i['truck_as_3'];
                $total_data10 += $i['mobil_tempel_atau_semi_trailer'];
                $total_data11 += $i['sepeda_motor'];
                $total_data12 += $i['sepeda'];
                $total_data13 += $i['becak'];
            }
        }

        //Utara Lurus
        if (isset($data_lalu_lintas->utara_ST)) {
            foreach ($data_lalu_lintas->utara_ST as $key => $i) {
                //Total Seluruh Data
                $total_data += $i['kendaraan_roda_tiga'];
                $total_data += $i['sedan'];
                $total_data += $i['oplet'];
                $total_data += $i['micro_bus'];
                $total_data += $i['bus'];
                $total_data += $i['pick_up'];
                $total_data += $i['micro_truck'];
                $total_data += $i['truck_as_2'];
                $total_data += $i['truck_as_3'];
                $total_data += $i['mobil_tempel_atau_semi_trailer'];
                $total_data += $i['sepeda_motor'];
                $total_data += $i['sepeda'];
                $total_data += $i['becak'];

                //Total Per Jenis Kendaraan
                $total_data1 += $i['kendaraan_roda_tiga'];
                $total_data2 += $i['sedan'];
                $total_data3 += $i['oplet'];
                $total_data4 += $i['micro_bus'];
                $total_data5 += $i['bus'];
                $total_data6 += $i['pick_up'];
                $total_data7 += $i['micro_truck'];
                $total_data8 += $i['truck_as_2'];
                $total_data9 += $i['truck_as_3'];
                $total_data10 += $i['mobil_tempel_atau_semi_trailer'];
                $total_data11 += $i['sepeda_motor'];
                $total_data12 += $i['sepeda'];
                $total_data13 += $i['becak'];
            }
        }
        //Utara Kiri
        if (isset($data_lalu_lintas->utara_LT)) {
            foreach ($data_lalu_lintas->utara_LT as $key => $i) {
                //Total Seluruh Data
                $total_data += $i['kendaraan_roda_tiga'];
                $total_data += $i['sedan'];
                $total_data += $i['oplet'];
                $total_data += $i['micro_bus'];
                $total_data += $i['bus'];
                $total_data += $i['pick_up'];
                $total_data += $i['micro_truck'];
                $total_data += $i['truck_as_2'];
                $total_data += $i['truck_as_3'];
                $total_data += $i['mobil_tempel_atau_semi_trailer'];
                $total_data += $i['sepeda_motor'];
                $total_data += $i['sepeda'];
                $total_data += $i['becak'];

                //Total Per Jenis Kendaraan

                $total_data1 += $i['kendaraan_roda_tiga'];
                $total_data2 += $i['sedan'];
                $total_data3 += $i['oplet'];
                $total_data4 += $i['micro_bus'];
                $total_data5 += $i['bus'];
                $total_data6 += $i['pick_up'];
                $total_data7 += $i['micro_truck'];
                $total_data8 += $i['truck_as_2'];
                $total_data9 += $i['truck_as_3'];
                $total_data10 += $i['mobil_tempel_atau_semi_trailer'];
                $total_data11 += $i['sepeda_motor'];
                $total_data12 += $i['sepeda'];
                $total_data13 += $i['becak'];
            }
        }
        //Timur Kanan
        if (isset($data_lalu_lintas->timur_RT)) {
            foreach ($data_lalu_lintas->timur_RT as $key => $i) {
                //Total Seluruh Data
                $total_data += $i['kendaraan_roda_tiga'];
                $total_data += $i['sedan'];
                $total_data += $i['oplet'];
                $total_data += $i['micro_bus'];
                $total_data += $i['bus'];
                $total_data += $i['pick_up'];
                $total_data += $i['micro_truck'];
                $total_data += $i['truck_as_2'];
                $total_data += $i['truck_as_3'];
                $total_data += $i['mobil_tempel_atau_semi_trailer'];
                $total_data += $i['sepeda_motor'];
                $total_data += $i['sepeda'];
                $total_data += $i['becak'];

                //Total Per Jenis Kendaraan
                $total_data1 += $i['kendaraan_roda_tiga'];
                $total_data2 += $i['sedan'];
                $total_data3 += $i['oplet'];
                $total_data4 += $i['micro_bus'];
                $total_data5 += $i['bus'];
                $total_data6 += $i['pick_up'];
                $total_data7 += $i['micro_truck'];
                $total_data8 += $i['truck_as_2'];
                $total_data9 += $i['truck_as_3'];
                $total_data10 += $i['mobil_tempel_atau_semi_trailer'];
                $total_data11 += $i['sepeda_motor'];
                $total_data12 += $i['sepeda'];
                $total_data13 += $i['becak'];
            }
        }
        //Timur ST
        if (isset($data_lalu_lintas->timur_ST)) {
            foreach ($data_lalu_lintas->timur_ST as $key => $i) {
                //Total Seluruh Data
                $total_data += $i['kendaraan_roda_tiga'];
                $total_data += $i['sedan'];
                $total_data += $i['oplet'];
                $total_data += $i['micro_bus'];
                $total_data += $i['bus'];
                $total_data += $i['pick_up'];
                $total_data += $i['micro_truck'];
                $total_data += $i['truck_as_2'];
                $total_data += $i['truck_as_3'];
                $total_data += $i['mobil_tempel_atau_semi_trailer'];
                $total_data += $i['sepeda_motor'];
                $total_data += $i['sepeda'];
                $total_data += $i['becak'];

                //Total Per Jenis Kendaraan
                $total_data1 += $i['kendaraan_roda_tiga'];
                $total_data2 += $i['sedan'];
                $total_data3 += $i['oplet'];
                $total_data4 += $i['micro_bus'];
                $total_data5 += $i['bus'];
                $total_data6 += $i['pick_up'];
                $total_data7 += $i['micro_truck'];
                $total_data8 += $i['truck_as_2'];
                $total_data9 += $i['truck_as_3'];
                $total_data10 += $i['mobil_tempel_atau_semi_trailer'];
                $total_data11 += $i['sepeda_motor'];
                $total_data12 += $i['sepeda'];
                $total_data13 += $i['becak'];
            }
        }
        //TImur Kiri
        if (isset($data_lalu_lintas->timur_LT)) {
            foreach ($data_lalu_lintas->timur_LT as $key => $i) {
                //Total Seluruh Data
                $total_data += $i['kendaraan_roda_tiga'];
                $total_data += $i['sedan'];
                $total_data += $i['oplet'];
                $total_data += $i['micro_bus'];
                $total_data += $i['bus'];
                $total_data += $i['pick_up'];
                $total_data += $i['micro_truck'];
                $total_data += $i['truck_as_2'];
                $total_data += $i['truck_as_3'];
                $total_data += $i['mobil_tempel_atau_semi_trailer'];
                $total_data += $i['sepeda_motor'];
                $total_data += $i['sepeda'];
                $total_data += $i['becak'];

                //Total Per Jenis Kendaraan
                $total_data1 += $i['kendaraan_roda_tiga'];
                $total_data2 += $i['sedan'];
                $total_data3 += $i['oplet'];
                $total_data4 += $i['micro_bus'];
                $total_data5 += $i['bus'];
                $total_data6 += $i['pick_up'];
                $total_data7 += $i['micro_truck'];
                $total_data8 += $i['truck_as_2'];
                $total_data9 += $i['truck_as_3'];
                $total_data10 += $i['mobil_tempel_atau_semi_trailer'];
                $total_data11 += $i['sepeda_motor'];
                $total_data12 += $i['sepeda'];
                $total_data13 += $i['becak'];
            }
        }
        // Selatan Kanan
        if (isset($data_lalu_lintas->selatan_RT)) {
            foreach ($data_lalu_lintas->selatan_RT as $key => $i) {
                //Total Seluruh Data
                $total_data += $i['kendaraan_roda_tiga'];
                $total_data += $i['sedan'];
                $total_data += $i['oplet'];
                $total_data += $i['micro_bus'];
                $total_data += $i['bus'];
                $total_data += $i['pick_up'];
                $total_data += $i['micro_truck'];
                $total_data += $i['truck_as_2'];
                $total_data += $i['truck_as_3'];
                $total_data += $i['mobil_tempel_atau_semi_trailer'];
                $total_data += $i['sepeda_motor'];
                $total_data += $i['sepeda'];
                $total_data += $i['becak'];

                //Total Per Jenis Kendaraan
                $total_data1 += $i['kendaraan_roda_tiga'];
                $total_data2 += $i['sedan'];
                $total_data3 += $i['oplet'];
                $total_data4 += $i['micro_bus'];
                $total_data5 += $i['bus'];
                $total_data6 += $i['pick_up'];
                $total_data7 += $i['micro_truck'];
                $total_data8 += $i['truck_as_2'];
                $total_data9 += $i['truck_as_3'];
                $total_data10 += $i['mobil_tempel_atau_semi_trailer'];
                $total_data11 += $i['sepeda_motor'];
                $total_data12 += $i['sepeda'];
                $total_data13 += $i['becak'];
            }
        }
        //Selatan Lurus1
        if (isset($data_lalu_lintas->selatan_ST)) {
            foreach ($data_lalu_lintas->selatan_ST as $key => $i) {
                //Total Seluruh Data
                $total_data += $i['kendaraan_roda_tiga'];
                $total_data += $i['sedan'];
                $total_data += $i['oplet'];
                $total_data += $i['micro_bus'];
                $total_data += $i['bus'];
                $total_data += $i['pick_up'];
                $total_data += $i['micro_truck'];
                $total_data += $i['truck_as_2'];
                $total_data += $i['truck_as_3'];
                $total_data += $i['mobil_tempel_atau_semi_trailer'];
                $total_data += $i['sepeda_motor'];
                $total_data += $i['sepeda'];
                $total_data += $i['becak'];

                //Total Per Jenis Kendaraan
                $total_data1 += $i['kendaraan_roda_tiga'];
                $total_data2 += $i['sedan'];
                $total_data3 += $i['oplet'];
                $total_data4 += $i['micro_bus'];
                $total_data5 += $i['bus'];
                $total_data6 += $i['pick_up'];
                $total_data7 += $i['micro_truck'];
                $total_data8 += $i['truck_as_2'];
                $total_data9 += $i['truck_as_3'];
                $total_data10 += $i['mobil_tempel_atau_semi_trailer'];
                $total_data11 += $i['sepeda_motor'];
                $total_data12 += $i['sepeda'];
                $total_data13 += $i['becak'];
            }
        }
        //Selatan LT
        if (isset($data_lalu_lintas->selatan_LT)) {
            foreach ($data_lalu_lintas->selatan_LT as $key => $i) {
                //Total Seluruh Data
                $total_data += $i['kendaraan_roda_tiga'];
                $total_data += $i['sedan'];
                $total_data += $i['oplet'];
                $total_data += $i['micro_bus'];
                $total_data += $i['bus'];
                $total_data += $i['pick_up'];
                $total_data += $i['micro_truck'];
                $total_data += $i['truck_as_2'];
                $total_data += $i['truck_as_3'];
                $total_data += $i['mobil_tempel_atau_semi_trailer'];
                $total_data += $i['sepeda_motor'];
                $total_data += $i['sepeda'];
                $total_data += $i['becak'];

                //Total Per Jenis Kendaraan
                $total_data1 += $i['kendaraan_roda_tiga'];
                $total_data2 += $i['sedan'];
                $total_data3 += $i['oplet'];
                $total_data4 += $i['micro_bus'];
                $total_data5 += $i['bus'];
                $total_data6 += $i['pick_up'];
                $total_data7 += $i['micro_truck'];
                $total_data8 += $i['truck_as_2'];
                $total_data9 += $i['truck_as_3'];
                $total_data10 += $i['mobil_tempel_atau_semi_trailer'];
                $total_data11 += $i['sepeda_motor'];
                $total_data12 += $i['sepeda'];
                $total_data13 += $i['becak'];
            }
        }

        //Barat RT
        if (isset($data_lalu_lintas->barat_RT)) {
            foreach ($data_lalu_lintas->barat_RT as $key => $i) {
                //Total Seluruh Data
                $total_data += $i['kendaraan_roda_tiga'];
                $total_data += $i['sedan'];
                $total_data += $i['oplet'];
                $total_data += $i['micro_bus'];
                $total_data += $i['bus'];
                $total_data += $i['pick_up'];
                $total_data += $i['micro_truck'];
                $total_data += $i['truck_as_2'];
                $total_data += $i['truck_as_3'];
                $total_data += $i['mobil_tempel_atau_semi_trailer'];
                $total_data += $i['sepeda_motor'];
                $total_data += $i['sepeda'];
                $total_data += $i['becak'];

                //Total Per Jenis Kendaraan
                $total_data1 += $i['kendaraan_roda_tiga'];
                $total_data2 += $i['sedan'];
                $total_data3 += $i['oplet'];
                $total_data4 += $i['micro_bus'];
                $total_data5 += $i['bus'];
                $total_data6 += $i['pick_up'];
                $total_data7 += $i['micro_truck'];
                $total_data8 += $i['truck_as_2'];
                $total_data9 += $i['truck_as_3'];
                $total_data10 += $i['mobil_tempel_atau_semi_trailer'];
                $total_data11 += $i['sepeda_motor'];
                $total_data12 += $i['sepeda'];
                $total_data13 += $i['becak'];
            }
        }
        //Barat ST
        if (isset($data_lalu_lintas->barat_ST)) {
            foreach ($data_lalu_lintas->barat_ST as $key => $i) {
                //Total Seluruh Data
                $total_data += $i['kendaraan_roda_tiga'];
                $total_data += $i['sedan'];
                $total_data += $i['oplet'];
                $total_data += $i['micro_bus'];
                $total_data += $i['bus'];
                $total_data += $i['pick_up'];
                $total_data += $i['micro_truck'];
                $total_data += $i['truck_as_2'];
                $total_data += $i['truck_as_3'];
                $total_data += $i['mobil_tempel_atau_semi_trailer'];
                $total_data += $i['sepeda_motor'];
                $total_data += $i['sepeda'];
                $total_data += $i['becak'];

                //Total Per Jenis Kendaraan
                $total_data1 += $i['kendaraan_roda_tiga'];
                $total_data2 += $i['sedan'];
                $total_data3 += $i['oplet'];
                $total_data4 += $i['micro_bus'];
                $total_data5 += $i['bus'];
                $total_data6 += $i['pick_up'];
                $total_data7 += $i['micro_truck'];
                $total_data8 += $i['truck_as_2'];
                $total_data9 += $i['truck_as_3'];
                $total_data10 += $i['mobil_tempel_atau_semi_trailer'];
                $total_data11 += $i['sepeda_motor'];
                $total_data12 += $i['sepeda'];
                $total_data13 += $i['becak'];
            }
        }
        //barat LT
        if (isset($data_lalu_lintas->barat_LT)) {
            foreach ($data_lalu_lintas->barat_LT as $key => $i) {
                //Total Seluruh Data
                $total_data += $i['kendaraan_roda_tiga'];
                $total_data += $i['sedan'];
                $total_data += $i['oplet'];
                $total_data += $i['micro_bus'];
                $total_data += $i['bus'];
                $total_data += $i['pick_up'];
                $total_data += $i['micro_truck'];
                $total_data += $i['truck_as_2'];
                $total_data += $i['truck_as_3'];
                $total_data += $i['mobil_tempel_atau_semi_trailer'];
                $total_data += $i['sepeda_motor'];
                $total_data += $i['sepeda'];
                $total_data += $i['becak'];

                //Total Per Jenis Kendaraan
                $total_data1 += $i['kendaraan_roda_tiga'];
                $total_data2 += $i['sedan'];
                $total_data3 += $i['oplet'];
                $total_data4 += $i['micro_bus'];
                $total_data5 += $i['bus'];
                $total_data6 += $i['pick_up'];
                $total_data7 += $i['micro_truck'];
                $total_data8 += $i['truck_as_2'];
                $total_data9 += $i['truck_as_3'];
                $total_data10 += $i['mobil_tempel_atau_semi_trailer'];
                $total_data11 += $i['sepeda_motor'];
                $total_data12 += $i['sepeda'];
                $total_data13 += $i['becak'];
            }
        }

        $total_table = array(
            array(
                'nama' => 'R3',
                'jumlah' => $total_data1,
                'persentase' => number_format($total_data1 / $total_data * 100, '2', ',', '.') . ' %'
            ),
            array(
                'nama' => 'Sedan',
                'jumlah' => $total_data2,
                'persentase' => number_format($total_data2 / $total_data * 100, '2', ',', '.') . ' %'
            ),
            array(
                'nama' => 'Oplet',
                'jumlah' => $total_data3,
                'persentase' => number_format($total_data3 / $total_data * 100, '2', ',', '.') . ' %'
            ),
            array(
                'nama' => 'Micro Bus',
                'jumlah' => $total_data4,
                'persentase' => number_format($total_data4 / $total_data * 100, '2', ',', '.') . ' %'
            ),
            array(
                'nama' => 'Bus',
                'jumlah' => $total_data5,
                'persentase' => number_format($total_data5 / $total_data * 100, '2', ',', '.') . ' %'
            ),
            array(
                'nama' => 'Pick Up',
                'jumlah' => $total_data6,
                'persentase' => number_format($total_data6 / $total_data * 100, '2', ',', '.') . ' %'
            ),
            array(
                'nama' => 'Micro Truck',
                'jumlah' => $total_data7,
                'persentase' => number_format($total_data7 / $total_data * 100, '2', ',', '.') . ' %'
            ),
            array(
                'nama' => 'Truk As 2',
                'jumlah' => $total_data8,
                'persentase' => number_format($total_data8 / $total_data * 100, '2', ',', '.') . ' %'
            ),
            array(
                'nama' => 'Truk As 3',
                'jumlah' => $total_data9,
                'persentase' => number_format($total_data9 / $total_data * 100, '2', ',', '.') . ' %'
            ),
            array(
                'nama' => 'Mobil Tempel / Semi Trailer',
                'jumlah' => $total_data10,
                'persentase' => number_format($total_data10 / $total_data * 100, '2', ',', '.') . ' %'
            ),
            array(
                'nama' => 'Sepeda Motor',
                'jumlah' => $total_data11,
                'persentase' => number_format($total_data11 / $total_data * 100, '2', ',', '.') . ' %'
            ),
            array(
                'nama' => 'Sepeda',
                'jumlah' => $total_data12,
                'persentase' => number_format($total_data12 / $total_data * 100, '2', ',', '.') . ' %'
            ),
            array(
                'nama' => 'Becak',
                'jumlah' => $total_data13,
                'persentase' => number_format($total_data13 / $total_data * 100, '2', ',', '.') . ' %'
            ),
            array(
                'nama' => 'Hasil',
                'jumlah' => $total_data,
                'persentase' => '100%',
                'bold' => 'true'
            )
        );

        $total_chart = array(
            array(
                'value' => $total_data1,
                'color' => '#f56954',
                'label' => 'R3',
            ),
            array(
                'value' => $total_data2,
                'color' => '#00a65a',
                'label' => 'Sedan',
            ),
            array(
                'value' => $total_data3,
                'color' => '#f39c12',
                'label' => 'Oplet'

            ),
            array(
                'value' => $total_data4,
                'color' => '#00c0ef',
                'label' => 'Micro Bus',
            ),
            array(
                'label' => 'Bus',
                'color' => '#3c8dbc',
                'value' => $total_data5
            ),
            array(
                'label' => 'Pick Up',
                'color' => '#d2d6de',
                'value' => $total_data6
            ),
            array(
                'label' => 'Micro Truck',
                'color' => '#fc1703',
                'value' => $total_data7
            ),
            array(
                'label' => 'Truk As 2',
                'color' => '#05d7eb',
                'value' => $total_data8
            ),
            array(
                'label' => 'Truk As 3',
                'color' => '#e305eb',
                'value' => $total_data9
            ),
            array(
                'label' => 'Mobil Tempel / Semi Trailer',
                'color' => '#8d99ba',
                'value' => $total_data10
            ),
            array(
                'label' => 'Sepeda Motor',
                'color' => '#2e3959',
                'value' => $total_data11
            ),
            array(
                'label' => 'Sepeda',
                'color' => '#85ff95',
                'value' => $total_data12
            ),
            array(
                'label' => 'Becak',
                'color' => '#5b76cf',
                'value' => $total_data13
            )
        );

        return view(
            'simpang4::data_lalu_lintas.identifikasi.komposisi_kendaraan',
            compact(
                'id',
                'data_simpang',
                'total_table',
                'total_chart'
            )
        );
    }

    public function komposisi_pergerakan($id)
    {
        $data_lalu_lintas = DataLaluLintas::find($id);
        $id_simpang = $data_lalu_lintas->id_simpang;
        $data_simpang = Simpang4::find($id_simpang);
        $mc = $data_simpang->mc;
        $lv = $data_simpang->lv;
        $hv = $data_simpang->hv;

        $jumlah_data = count($data_lalu_lintas->utara_LT);

        $jams = array();

        $utara_gt = 0;
        $utara_RT_gt = 0;
        $utara_ST_gt = 0;
        $utara_LT_gt = 0;

        $timur_gt = 0;
        $timur_RT_gt = 0;
        $timur_ST_gt = 0;
        $timur_LT_gt = 0;

        $selatan_gt = 0;
        $selatan_RT_gt = 0;
        $selatan_ST_gt = 0;
        $selatan_LT_gt = 0;

        $barat_gt = 0;
        $barat_RT_gt = 0;
        $barat_ST_gt = 0;
        $barat_LT_gt = 0;

        for ($i = 0; $i < $jumlah_data; $i++) {
            $jam_awal = $data_lalu_lintas->utara_LT[$i]['jam_awal'];
            $split_jam_awal = explode('.', $jam_awal);
            $new_jam_akhir = $split_jam_awal[0] + 1;
            if ($new_jam_akhir >= 0 & $new_jam_akhir <= 9) {
                $new_jam_akhir = "0" . $new_jam_akhir;
            }
            $jam_akhir = $new_jam_akhir . '.' . $split_jam_awal[1];
            $new_jam = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir
            );
            $jams[] = $new_jam;
        }

        foreach ($jams as $jam) {
            $jam_awal = $jam['jam_awal'];
            $jam_akhir = $jam['jam_akhir'];

            //Initialization
            //utara
            $utara_RT_mc = 0;
            $utara_RT_lv = 0;
            $utara_RT_hv = 0;
            $utara_RT_um = 0;

            $utara_ST_mc = 0;
            $utara_ST_lv = 0;
            $utara_ST_hv = 0;
            $utara_ST_um = 0;

            $utara_LT_mc = 0;
            $utara_LT_lv = 0;
            $utara_LT_hv = 0;
            $utara_LT_um = 0;

            //timur
            $timur_RT_mc = 0;
            $timur_RT_lv = 0;
            $timur_RT_hv = 0;
            $timur_RT_um = 0;

            $timur_ST_mc = 0;
            $timur_ST_lv = 0;
            $timur_ST_hv = 0;
            $timur_ST_um = 0;

            $timur_LT_mc = 0;
            $timur_LT_lv = 0;
            $timur_LT_hv = 0;
            $timur_LT_um = 0;
            //selatan
            $selatan_RT_mc = 0;
            $selatan_RT_lv = 0;
            $selatan_RT_hv = 0;
            $selatan_RT_um = 0;

            $selatan_ST_mc = 0;
            $selatan_ST_lv = 0;
            $selatan_ST_hv = 0;
            $selatan_ST_um = 0;

            $selatan_LT_mc = 0;
            $selatan_LT_lv = 0;
            $selatan_LT_hv = 0;
            $selatan_LT_um = 0;
            //barat
            $barat_RT_mc = 0;
            $barat_RT_lv = 0;
            $barat_RT_hv = 0;
            $barat_RT_um = 0;

            $barat_ST_mc = 0;
            $barat_ST_lv = 0;
            $barat_ST_hv = 0;
            $barat_ST_um = 0;

            $barat_LT_mc = 0;
            $barat_LT_lv = 0;
            $barat_LT_hv = 0;
            $barat_LT_um = 0;
            //Loop
            for ($i = 0; $i < $jumlah_data; $i++) { //Column Loop
                //Mencari Data Utara Lurus
                //Data Di Ambil Dari Collection
                $tmp_jam_awal = $data_lalu_lintas->utara_RT[$i]['jam_awal'];
                $tmp_jam_akhir = $data_lalu_lintas->utara_RT[$i]['jam_akhir'];

                if ($tmp_jam_awal >= $jam_awal && $tmp_jam_awal < $jam_akhir) {

                    //Pemrosesan Data
                    //Utara                    
                    //utara Kanan1
                    $data1 = $data_lalu_lintas->utara_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->utara_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->utara_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->utara_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->utara_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->utara_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->utara_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->utara_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->utara_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->utara_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->utara_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->utara_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->utara_RT[$i]['becak'];

                    $utara_RT_mc += $data11;
                    $utara_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $utara_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $utara_RT_um += $data12 + $data13;

                    //Utara Lurus
                    $data1 =  $data_lalu_lintas->utara_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->utara_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->utara_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->utara_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->utara_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->utara_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->utara_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->utara_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->utara_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->utara_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->utara_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->utara_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->utara_ST[$i]['becak'];

                    $utara_ST_mc += $data11;
                    $utara_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $utara_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $utara_ST_um += $data12 + $data13;

                    //Utara  Kiri
                    $data1 = $data_lalu_lintas->utara_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->utara_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->utara_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->utara_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->utara_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->utara_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->utara_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->utara_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->utara_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->utara_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->utara_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->utara_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->utara_LT[$i]['becak'];

                    $utara_LT_mc += $data11;
                    $utara_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $utara_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $utara_LT_um += $data12 + $data13;
                    //Timur
                    //Timur Kanan
                    $data1 = $data_lalu_lintas->timur_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->timur_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->timur_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->timur_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->timur_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->timur_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->timur_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->timur_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->timur_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->timur_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->timur_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->timur_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->timur_RT[$i]['becak'];

                    $timur_RT_mc += $data11;
                    $timur_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $timur_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $timur_RT_um += $data12 + $data13;

                    //Timur ST
                    $data1 = $data_lalu_lintas->timur_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->timur_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->timur_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->timur_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->timur_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->timur_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->timur_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->timur_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->timur_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->timur_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->timur_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->timur_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->timur_ST[$i]['becak'];

                    $timur_ST_mc += $data11;
                    $timur_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $timur_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $timur_ST_um += $data12 + $data13;

                    //Timur Kiri
                    $data1 = $data_lalu_lintas->timur_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->timur_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->timur_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->timur_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->timur_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->timur_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->timur_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->timur_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->timur_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->timur_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->timur_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->timur_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->timur_LT[$i]['becak'];

                    $timur_LT_mc += $data11;
                    $timur_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $timur_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $timur_LT_um += $data12 + $data13;
                    //Selatan
                    //Selatan Kanan
                    $data1 = $data_lalu_lintas->selatan_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->selatan_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->selatan_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->selatan_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->selatan_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->selatan_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->selatan_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->selatan_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->selatan_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->selatan_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->selatan_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->selatan_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->selatan_RT[$i]['becak'];

                    $selatan_RT_mc += $data11;
                    $selatan_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $selatan_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $selatan_RT_um += $data12 + $data13;

                    //Selatan Lurus1
                    $data1 = $data_lalu_lintas->selatan_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->selatan_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->selatan_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->selatan_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->selatan_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->selatan_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->selatan_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->selatan_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->selatan_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->selatan_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->selatan_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->selatan_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->selatan_ST[$i]['becak'];

                    $selatan_ST_mc += $data11;
                    $selatan_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $selatan_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $selatan_ST_um += $data12 + $data13;

                    //Selatan LT
                    $data1 = $data_lalu_lintas->selatan_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->selatan_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->selatan_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->selatan_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->selatan_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->selatan_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->selatan_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->selatan_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->selatan_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->selatan_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->selatan_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->selatan_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->selatan_LT[$i]['becak'];

                    $selatan_LT_mc += $data11;
                    $selatan_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $selatan_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $selatan_LT_um += $data12 + $data13;
                    //Barat
                    //Barat Kanan
                    $data1 = $data_lalu_lintas->barat_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->barat_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->barat_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->barat_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->barat_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->barat_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->barat_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->barat_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->barat_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->barat_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->barat_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->barat_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->barat_RT[$i]['becak'];

                    $barat_RT_mc += $data11;
                    $barat_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $barat_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $barat_RT_um += $data12 + $data13;

                    //Barat ST
                    $data1 =  $data_lalu_lintas->barat_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->barat_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->barat_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->barat_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->barat_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->barat_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->barat_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->barat_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->barat_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->barat_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->barat_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->barat_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->barat_ST[$i]['becak'];

                    $barat_ST_mc += $data11;
                    $barat_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $barat_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $barat_ST_um += $data12 + $data13;

                    //Barat LT
                    $data1 = $data_lalu_lintas->barat_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->barat_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->barat_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->barat_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->barat_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->barat_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->barat_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->barat_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->barat_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->barat_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->barat_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->barat_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->barat_LT[$i]['becak'];

                    $barat_LT_mc += $data11;
                    $barat_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $barat_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $barat_LT_um += $data12 + $data13;
                }
            }

            // Loop Tambahan
            if ($jam_awal > 23.00) {
                // echo $jam_awal.'-';
                $jam_awal = $jam_awal - 24.05;
                $jam_akhir = $jam_akhir - 24.05;
                for ($i = 0; $i < $jumlah_data; $i++) { //Column Loop
                    //Mencari Data Utara Lurus
                    //Data Di Ambil Dari Collection
                    $tmp_jam_awal = $data_lalu_lintas->utara_RT[$i]['jam_awal'];
                    $tmp_jam_akhir = $data_lalu_lintas->utara_RT[$i]['jam_akhir'];
                    if ($tmp_jam_awal >= $jam_awal && $tmp_jam_awal < $jam_akhir) {
                        //Utara                    
                        //utara Kanan1
                        $data1 = $data_lalu_lintas->utara_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->utara_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->utara_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->utara_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->utara_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->utara_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->utara_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->utara_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->utara_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->utara_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->utara_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->utara_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->utara_RT[$i]['becak'];

                        $utara_RT_mc += $data11;
                        $utara_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $utara_RT_hv += $data5 + $data8 + $data9 + $data10;
                        $utara_RT_um += $data12 + $data13;

                        //Utara Lurus
                        $data1 =  $data_lalu_lintas->utara_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->utara_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->utara_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->utara_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->utara_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->utara_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->utara_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->utara_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->utara_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->utara_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->utara_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->utara_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->utara_ST[$i]['becak'];

                        $utara_ST_mc += $data11;
                        $utara_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $utara_ST_hv += $data5 + $data8 + $data9 + $data10;
                        $utara_ST_um += $data12 + $data13;

                        //Utara  Kiri
                        $data1 = $data_lalu_lintas->utara_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->utara_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->utara_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->utara_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->utara_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->utara_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->utara_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->utara_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->utara_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->utara_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->utara_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->utara_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->utara_LT[$i]['becak'];

                        $utara_LT_mc += $data11;
                        $utara_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $utara_LT_hv += $data5 + $data8 + $data9 + $data10;
                        $utara_LT_um += $data12 + $data13;
                        //Timur
                        //Timur Kanan
                        $data1 = $data_lalu_lintas->timur_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->timur_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->timur_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->timur_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->timur_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->timur_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->timur_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->timur_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->timur_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->timur_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->timur_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->timur_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->timur_RT[$i]['becak'];

                        $timur_RT_mc += $data11;
                        $timur_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $timur_RT_hv += $data5 + $data8 + $data9 + $data10;
                        $timur_RT_um += $data12 + $data13;

                        //Timur ST
                        $data1 = $data_lalu_lintas->timur_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->timur_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->timur_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->timur_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->timur_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->timur_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->timur_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->timur_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->timur_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->timur_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->timur_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->timur_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->timur_ST[$i]['becak'];

                        $timur_ST_mc += $data11;
                        $timur_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $timur_ST_hv += $data5 + $data8 + $data9 + $data10;
                        $timur_ST_um += $data12 + $data13;

                        //Timur Kiri
                        $data1 = $data_lalu_lintas->timur_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->timur_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->timur_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->timur_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->timur_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->timur_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->timur_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->timur_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->timur_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->timur_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->timur_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->timur_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->timur_LT[$i]['becak'];

                        $timur_LT_mc += $data11;
                        $timur_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $timur_LT_hv += $data5 + $data8 + $data9 + $data10;
                        $timur_LT_um += $data12 + $data13;
                        //Selatan
                        //Selatan Kanan
                        $data1 = $data_lalu_lintas->selatan_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->selatan_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->selatan_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->selatan_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->selatan_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->selatan_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->selatan_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->selatan_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->selatan_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->selatan_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->selatan_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->selatan_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->selatan_RT[$i]['becak'];

                        $selatan_RT_mc += $data11;
                        $selatan_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $selatan_RT_hv += $data5 + $data8 + $data9 + $data10;
                        $selatan_RT_um += $data12 + $data13;

                        //Selatan Lurus1
                        $data1 = $data_lalu_lintas->selatan_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->selatan_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->selatan_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->selatan_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->selatan_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->selatan_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->selatan_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->selatan_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->selatan_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->selatan_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->selatan_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->selatan_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->selatan_ST[$i]['becak'];

                        $selatan_ST_mc += $data11;
                        $selatan_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $selatan_ST_hv += $data5 + $data8 + $data9 + $data10;
                        $selatan_ST_um += $data12 + $data13;

                        //Selatan LT
                        $data1 = $data_lalu_lintas->selatan_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->selatan_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->selatan_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->selatan_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->selatan_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->selatan_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->selatan_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->selatan_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->selatan_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->selatan_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->selatan_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->selatan_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->selatan_LT[$i]['becak'];

                        $selatan_LT_mc += $data11;
                        $selatan_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $selatan_LT_hv += $data5 + $data8 + $data9 + $data10;
                        $selatan_LT_um += $data12 + $data13;
                        //Barat
                        //Barat Kanan
                        $data1 = $data_lalu_lintas->barat_RT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->barat_RT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->barat_RT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->barat_RT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->barat_RT[$i]['bus'];
                        $data6 = $data_lalu_lintas->barat_RT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->barat_RT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->barat_RT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->barat_RT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->barat_RT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->barat_RT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->barat_RT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->barat_RT[$i]['becak'];

                        $barat_RT_mc += $data11;
                        $barat_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $barat_RT_hv += $data5 + $data8 + $data9 + $data10;
                        $barat_RT_um += $data12 + $data13;

                        //Barat ST
                        $data1 =  $data_lalu_lintas->barat_ST[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->barat_ST[$i]['sedan'];
                        $data3 = $data_lalu_lintas->barat_ST[$i]['oplet'];
                        $data4 = $data_lalu_lintas->barat_ST[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->barat_ST[$i]['bus'];
                        $data6 = $data_lalu_lintas->barat_ST[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->barat_ST[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->barat_ST[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->barat_ST[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->barat_ST[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->barat_ST[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->barat_ST[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->barat_ST[$i]['becak'];

                        $barat_ST_mc += $data11;
                        $barat_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $barat_ST_hv += $data5 + $data8 + $data9 + $data10;
                        $barat_ST_um += $data12 + $data13;

                        //Barat LT
                        $data1 = $data_lalu_lintas->barat_LT[$i]['kendaraan_roda_tiga'];
                        $data2 = $data_lalu_lintas->barat_LT[$i]['sedan'];
                        $data3 = $data_lalu_lintas->barat_LT[$i]['oplet'];
                        $data4 = $data_lalu_lintas->barat_LT[$i]['micro_bus'];
                        $data5 = $data_lalu_lintas->barat_LT[$i]['bus'];
                        $data6 = $data_lalu_lintas->barat_LT[$i]['pick_up'];
                        $data7 = $data_lalu_lintas->barat_LT[$i]['micro_truck'];
                        $data8 = $data_lalu_lintas->barat_LT[$i]['truck_as_2'];
                        $data9 = $data_lalu_lintas->barat_LT[$i]['truck_as_3'];
                        $data10 = $data_lalu_lintas->barat_LT[$i]['mobil_tempel_atau_semi_trailer'];
                        $data11 = $data_lalu_lintas->barat_LT[$i]['sepeda_motor'];
                        $data12 = $data_lalu_lintas->barat_LT[$i]['sepeda'];
                        $data13 = $data_lalu_lintas->barat_LT[$i]['becak'];

                        $barat_LT_mc += $data11;
                        $barat_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                        $barat_LT_hv += $data5 + $data8 + $data9 + $data10;
                        $barat_LT_um += $data12 + $data13;
                    }
                }
            }

            //Make Array & Push

            //Utara RT
            $utara_RT_mc *= $mc;
            $utara_RT_lv *= $lv;
            $utara_RT_hv *= $hv;
            $utara_RT_total = $utara_RT_mc + $utara_RT_lv + $utara_RT_hv;

            //Utara Lurus
            $utara_ST_mc *= $mc;
            $utara_ST_lv *= $lv;
            $utara_ST_hv *= $hv;
            $utara_ST_total = $utara_ST_mc + $utara_ST_lv + $utara_ST_hv;

            //Utara Kiri
            $utara_LT_mc *= $mc;
            $utara_LT_lv *= $lv;
            $utara_LT_hv *= $hv;
            $utara_LT_total = $utara_LT_mc + $utara_LT_lv + $utara_LT_hv;

            //Timur Kanan
            $timur_RT_mc *= $mc;
            $timur_RT_lv *= $lv;
            $timur_RT_hv *= $hv;
            $timur_RT_total = $timur_RT_mc + $timur_RT_lv + $timur_RT_hv;

            //Timur Lurus1
            $timur_ST_mc *= $mc;
            $timur_ST_lv *= $lv;
            $timur_ST_hv *= $hv;
            $timur_ST_total = $timur_ST_mc + $timur_ST_lv + $timur_ST_hv;

            //Timur Kiri
            $timur_LT_mc *= $mc;
            $timur_LT_lv *= $lv;
            $timur_LT_hv *= $hv;
            $timur_LT_total = $timur_LT_mc + $timur_LT_lv + $timur_LT_hv;

            //Selatan Kanan
            $selatan_RT_mc *= $mc;
            $selatan_RT_lv *= $lv;
            $selatan_RT_hv *= $hv;
            $selatan_RT_total = $selatan_RT_mc + $selatan_RT_lv + $selatan_RT_hv;

            //Selatan Lurus1
            $selatan_ST_mc *= $mc;
            $selatan_ST_lv *= $lv;
            $selatan_ST_hv *= $hv;
            $selatan_ST_total = $selatan_ST_mc + $selatan_ST_lv + $selatan_ST_hv;

            //Selatan Kiri
            $selatan_LT_mc *= $mc;
            $selatan_LT_lv *= $lv;
            $selatan_LT_hv *= $hv;
            $selatan_LT_total = $selatan_LT_mc + $selatan_LT_lv + $selatan_LT_hv;

            //Barat Kanan
            $barat_RT_mc *= $mc;
            $barat_RT_lv *= $lv;
            $barat_RT_hv *= $hv;
            $barat_RT_total = $barat_RT_mc + $barat_RT_lv + $barat_RT_hv;

            //barat ST
            $barat_ST_mc *= $mc;
            $barat_ST_lv *= $lv;
            $barat_ST_hv *= $hv;
            $barat_ST_total = $barat_ST_mc + $barat_ST_lv + $barat_ST_hv;

            //Barat LT
            $barat_LT_mc *= $mc;
            $barat_LT_lv *= $lv;
            $barat_LT_hv *= $hv;
            $barat_LT_total = $barat_LT_mc + $barat_LT_lv + $barat_LT_hv;

            //Total
            $total_utara = $utara_RT_total + $utara_ST_total + $utara_LT_total;
            $total_timur = $timur_RT_total + $timur_ST_total + $timur_LT_total;
            $total_selatan = $selatan_RT_total + $selatan_ST_total + $selatan_LT_total;
            $total_barat = $barat_RT_total + $barat_ST_total + $barat_LT_total;

            $utara_gt += $total_utara;
            $utara_RT_gt += $utara_RT_total;
            $utara_ST_gt += $utara_ST_total;
            $utara_LT_gt += $utara_LT_total;

            $timur_gt += $total_timur;
            $timur_RT_gt += $timur_RT_total;
            $timur_ST_gt += $timur_ST_total;
            $timur_LT_gt += $timur_LT_total;

            $selatan_gt += $total_selatan;
            $selatan_RT_gt += $selatan_RT_total;
            $selatan_ST_gt += $selatan_ST_total;
            $selatan_LT_gt += $selatan_LT_total;

            $barat_gt += $total_barat;
            $barat_RT_gt += $barat_RT_total;
            $barat_ST_gt += $barat_ST_total;
            $barat_LT_gt += $barat_LT_total;
        }

        $utara_RT  = ($utara_gt > 0 ? number_format($utara_RT_gt / $utara_gt * 100, '2', ',', '.') : 0);
        $utara_ST  = ($utara_gt > 0 ? number_format($utara_ST_gt / $utara_gt * 100, '2', ',', '.') : 0);
        $utara_LT = ($utara_gt > 0 ? number_format($utara_LT_gt / $utara_gt * 100, '2', ',', '.') : 0);

        $timur_RT = ($timur_gt > 0 ? number_format($timur_RT_gt / $timur_gt * 100, '2', ',', '.') : 0);
        $timur_ST  = ($timur_gt > 0 ? number_format($timur_ST_gt / $timur_gt * 100, '2', ',', '.') : 0);
        $timur_LT = ($timur_gt > 0 ? number_format($timur_LT_gt / $timur_gt * 100, '2', ',', '.') : 0);

        $selatan_RT = ($selatan_gt > 0 ? number_format($selatan_RT_gt / $selatan_gt * 100, '2', ',', '.') : 0);
        $selatan_ST = ($selatan_gt > 0 ? number_format($selatan_ST_gt / $selatan_gt * 100, '2', ',', '.') : 0);
        $selatan_LT = ($selatan_gt > 0 ? number_format($selatan_LT_gt / $selatan_gt * 100, '2', ',', '.') : 0);

        $barat_RT = ($barat_gt > 0 ? number_format($barat_RT_gt / $barat_gt * 100, '2', ',', '.') : 0);
        $barat_ST = ($barat_gt > 0 ? number_format($barat_ST_gt / $barat_gt * 100, '2', ',', '.') : 0);
        $barat_LT = ($barat_gt > 0 ? number_format($barat_LT_gt / $barat_gt * 100, '2', ',', '.') : 0);

        $data_table = array(
            'utara_RT' => $utara_RT  . '%',
            'utara_ST' => $utara_ST  . '%',
            'utara_LT' => $utara_LT . '%',

            'timur_RT' => $timur_RT . '%',
            'timur_ST' => $timur_ST . '%',
            'timur_LT' => $timur_LT . '%',

            'selatan_RT' => $selatan_RT . '%',
            'selatan_ST' => $selatan_ST . '%',
            'selatan_LT' => $selatan_LT . '%',

            'barat_RT' => $barat_RT . '%',
            'barat_ST' => $barat_ST  . '%',
            'barat_LT' => $barat_LT . '%',
        );

        $utara_RT  = ($utara_gt > 0 ? $utara_RT_gt / $utara_gt * 100 : 0);
        $utara_ST  = ($utara_gt > 0 ? $utara_ST_gt / $utara_gt * 100 : 0);
        $utara_LT = ($utara_gt > 0 ? $utara_LT_gt / $utara_gt * 100 : 0);

        $timur_RT = ($timur_gt > 0 ? $timur_RT_gt / $timur_gt * 100 : 0);
        $timur_ST = ($timur_gt > 0 ? $timur_ST_gt / $timur_gt * 100 : 0);
        $timur_LT = ($timur_gt > 0 ? $timur_LT_gt / $timur_gt * 100 : 0);

        $selatan_RT = ($selatan_gt > 0 ? $selatan_RT_gt / $selatan_gt * 100 : 0);
        $selatan_ST = ($selatan_gt > 0 ? $selatan_ST_gt / $selatan_gt * 100 : 0);
        $selatan_LT = ($selatan_gt > 0 ? $selatan_LT_gt / $selatan_gt * 100 : 0);

        $barat_RT = ($barat_gt > 0 ? $barat_RT_gt / $barat_gt * 100 : 0);
        $barat_ST = ($barat_gt > 0 ? $barat_ST_gt / $barat_gt * 100 : 0);
        $barat_LT = ($barat_gt > 0 ? $barat_LT_gt / $barat_gt * 100 : 0);

        $data_chart = array(
            $utara_RT, $utara_ST, $utara_LT,
            $timur_RT, $timur_ST, $timur_LT,
            $selatan_RT, $selatan_ST, $selatan_LT,
            $barat_RT, $barat_ST, $barat_LT,
        );

        return view('simpang4::data_lalu_lintas.identifikasi.komposisi_pergerakan', compact('id', 'data_simpang', 'data_table', 'data_chart'));
    }

    public function jam_puncak($id)
    {
        $data_lalu_lintas = DataLaluLintas::find($id);
        $id_simpang = $data_lalu_lintas->id_simpang;
        $data_simpang = Simpang4::find($id_simpang);
        $mc = $data_simpang->mc;
        $lv = $data_simpang->lv;
        $hv = $data_simpang->hv;

        $jumlah_data = count($data_lalu_lintas->utara_LT);
        $looping_max = $jumlah_data - 5;

        for ($i = 0; $i < $looping_max; $i++) {
            $jam_awal = $data_lalu_lintas->utara_LT[$i]['jam_awal'];
            $split_jam_awal = explode('.', $jam_awal);
            $new_jam_akhir = $split_jam_awal[0] + 1;
            if ($new_jam_akhir >= 0 & $new_jam_akhir <= 9) {
                $new_jam_akhir = "0" . $new_jam_akhir;
            }
            $jam_akhir = $new_jam_akhir . '.' . $split_jam_awal[1];
            $new_jam = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir
            );
            $jams[] = $new_jam;
        }

        $periode = 0;
        $super_grand_total = 0;

        $pagi_grand_total = 0;
        $data_pagi_jam_puncak = array(
            'jam_puncak' => '',
            'grand_total' => '0',

            'total_utara' =>  '0',
            'total_mc_utara' => '0',
            'total_lv_utara' => '0',
            'total_hv_utara' => '0',

            'total_timur' => '0',
            'total_mc_timur' => '0',
            'total_lv_timur' => '0',
            'total_hv_timur' => '0',

            'total_selatan' => '0',
            'total_mc_selatan' => '0',
            'total_lv_selatan' => '0',
            'total_hv_selatan' => '0',

            'total_barat' => '0',
            'total_mc_barat' => '0',
            'total_lv_barat' => '0',
            'total_hv_barat' => '0',
        );

        $siang_grand_total = 0;
        $data_siang_jam_puncak = array(
            'jam_puncak' => '',
            'grand_total' => '0',

            'total_utara' =>  '0',
            'total_mc_utara' => '0',
            'total_lv_utara' => '0',
            'total_hv_utara' => '0',

            'total_timur' => '0',
            'total_mc_timur' => '0',
            'total_lv_timur' => '0',
            'total_hv_timur' => '0',

            'total_selatan' => '0',
            'total_mc_selatan' => '0',
            'total_lv_selatan' => '0',
            'total_hv_selatan' => '0',

            'total_barat' => '0',
            'total_mc_barat' => '0',
            'total_lv_barat' => '0',
            'total_hv_barat' => '0',
        );


        $sore_grand_total = 0;
        $data_sore_jam_puncak = array(
            'jam_puncak' => '',
            'grand_total' => '0',

            'total_utara' =>  '0',
            'total_mc_utara' => '0',
            'total_lv_utara' => '0',
            'total_hv_utara' => '0',

            'total_timur' => '0',
            'total_mc_timur' => '0',
            'total_lv_timur' => '0',
            'total_hv_timur' => '0',

            'total_selatan' => '0',
            'total_mc_selatan' => '0',
            'total_lv_selatan' => '0',
            'total_hv_selatan' => '0',

            'total_barat' => '0',
            'total_mc_barat' => '0',
            'total_lv_barat' => '0',
            'total_hv_barat' => '0',
        );

        $malam_grand_total = 0;
        $data_malam_jam_puncak = array(
            'jam_puncak' => '',
            'grand_total' => '0',

            'total_utara' =>  '0',
            'total_mc_utara' => '0',
            'total_lv_utara' => '0',
            'total_hv_utara' => '0',

            'total_timur' => '0',
            'total_mc_timur' => '0',
            'total_lv_timur' => '0',
            'total_hv_timur' => '0',

            'total_selatan' => '0',
            'total_mc_selatan' => '0',
            'total_lv_selatan' => '0',
            'total_hv_selatan' => '0',

            'total_barat' => '0',
            'total_mc_barat' => '0',
            'total_lv_barat' => '0',
            'total_hv_barat' => '0',
        );

        $pendekat = array(

            //Utara Kanan
            'utara_RT' => '0',
            'utara_RT_lv' => '0',
            'utara_RT_hv' => '0',
            'utara_RT_mc' => '0',
            'utara_RT_um' => '0',

            //Utara Lurus
            'utara_ST' => '0',
            'utara_ST_lv' => '0',
            'utara_ST_hv' => '0',
            'utara_ST_mc' => '0',
            'utara_ST_um' => '0',

            //Utara Kiri
            'utara_LT' => '0',
            'utara_LT_lv' => '0',
            'utara_LT_hv' => '0',
            'utara_LT_mc' => '0',
            'utara_LT_um' => '0',

            //Timur Kanan
            'timur_RT' => '0',
            'timur_RT_lv' => '0',
            'timur_RT_hv' => '0',
            'timur_RT_mc' => '0',
            'timur_RT_um' => '0',

            //Timur ST
            'timur_ST' => '0',
            'timur_ST_lv' => '0',
            'timur_ST_hv' => '0',
            'timur_ST_mc' => '0',
            'timur_ST_um' => '0',

            //Timur Kiri
            'timur_LT' => '0',
            'timur_LT_lv' => '0',
            'timur_LT_hv' => '0',
            'timur_LT_mc' => '0',
            'timur_LT_um' => '0',

            //selatan Kanan
            'selatan_RT' => '0',
            'selatan_RT_lv' => '0',
            'selatan_RT_hv' => '0',
            'selatan_RT_mc' => '0',
            'selatan_RT_um' => '0',

            //selatan ST
            'selatan_ST' => '0',
            'selatan_ST_lv' => '0',
            'selatan_ST_hv' => '0',
            'selatan_ST_mc' => '0',
            'selatan_ST_um' => '0',

            //selatan Kiri
            'selatan_LT' => '0',
            'selatan_LT_lv' => '0',
            'selatan_LT_hv' => '0',
            'selatan_LT_mc' => '0',
            'selatan_LT_um' => '0',

            //barat Kanan
            'barat_RT' => '0',
            'barat_RT_lv' => '0',
            'barat_RT_hv' => '0',
            'barat_RT_mc' => '0',
            'barat_RT_um' => '0',

            //barat ST
            'barat_ST' => '0',
            'barat_ST_lv' => '0',
            'barat_ST_hv' => '0',
            'barat_ST_mc' => '0',
            'barat_ST_um' => '0',

            //barat LT
            'barat_LT' => '0',
            'barat_LT_lv' => '0',
            'barat_LT_hv' => '0',
            'barat_LT_mc' => '0',
            'barat_LT_um' => '0',
        );



        foreach ($jams as $jam) { //Row Loop
            //Mendapatkan Jam Awal
            $jam_awal = $jam['jam_awal'];
            $jam_akhir = $jam['jam_akhir'];

            //Initialization
            //utara
            $utara_RT_mc = 0;
            $utara_RT_lv = 0;
            $utara_RT_hv = 0;
            $utara_RT_um = 0;

            $utara_ST_mc = 0;
            $utara_ST_lv = 0;
            $utara_ST_hv = 0;
            $utara_ST_um = 0;

            $utara_LT_mc = 0;
            $utara_LT_lv = 0;
            $utara_LT_hv = 0;
            $utara_LT_um = 0;

            //timur
            $timur_RT_mc = 0;
            $timur_RT_lv = 0;
            $timur_RT_hv = 0;
            $timur_RT_um = 0;

            $timur_ST_mc = 0;
            $timur_ST_lv = 0;
            $timur_ST_hv = 0;
            $timur_ST_um = 0;

            $timur_LT_mc = 0;
            $timur_LT_lv = 0;
            $timur_LT_hv = 0;
            $timur_LT_um = 0;
            //selatan
            $selatan_RT_mc = 0;
            $selatan_RT_lv = 0;
            $selatan_RT_hv = 0;
            $selatan_RT_um = 0;

            $selatan_ST_mc = 0;
            $selatan_ST_lv = 0;
            $selatan_ST_hv = 0;
            $selatan_ST_um = 0;

            $selatan_LT_mc = 0;
            $selatan_LT_lv = 0;
            $selatan_LT_hv = 0;
            $selatan_LT_um = 0;
            //barat
            $barat_RT_mc = 0;
            $barat_RT_lv = 0;
            $barat_RT_hv = 0;
            $barat_RT_um = 0;

            $barat_ST_mc = 0;
            $barat_ST_lv = 0;
            $barat_ST_hv = 0;
            $barat_ST_um = 0;

            $barat_LT_mc = 0;
            $barat_LT_lv = 0;
            $barat_LT_hv = 0;
            $barat_LT_um = 0;

            for ($i = 0; $i < $jumlah_data; $i++) {
                //Mencari Data Utara Lurus
                //Data Di Ambil Dari Collection
                $tmp_jam_awal = $data_lalu_lintas->utara_RT[$i]['jam_awal'];
                $tmp_jam_akhir = $data_lalu_lintas->utara_RT[$i]['jam_akhir'];

                if ($tmp_jam_awal >= $jam_awal && $tmp_jam_awal < $jam_akhir) {

                    //Utara                    
                    //utara Kanan1
                    $data1 = $data_lalu_lintas->utara_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->utara_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->utara_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->utara_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->utara_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->utara_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->utara_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->utara_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->utara_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->utara_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->utara_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->utara_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->utara_RT[$i]['becak'];

                    $utara_RT_mc += $data11;
                    $utara_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $utara_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $utara_RT_um += $data12 + $data13;

                    //Utara Lurus
                    $data1 =  $data_lalu_lintas->utara_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->utara_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->utara_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->utara_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->utara_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->utara_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->utara_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->utara_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->utara_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->utara_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->utara_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->utara_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->utara_ST[$i]['becak'];

                    $utara_ST_mc += $data11;
                    $utara_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $utara_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $utara_ST_um += $data12 + $data13;

                    //Utara  Kiri
                    $data1 = $data_lalu_lintas->utara_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->utara_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->utara_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->utara_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->utara_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->utara_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->utara_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->utara_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->utara_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->utara_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->utara_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->utara_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->utara_LT[$i]['becak'];

                    $utara_LT_mc += $data11;
                    $utara_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $utara_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $utara_LT_um += $data12 + $data13;
                    //Timur
                    //Timur Kanan
                    $data1 = $data_lalu_lintas->timur_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->timur_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->timur_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->timur_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->timur_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->timur_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->timur_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->timur_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->timur_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->timur_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->timur_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->timur_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->timur_RT[$i]['becak'];

                    $timur_RT_mc += $data11;
                    $timur_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $timur_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $timur_RT_um += $data12 + $data13;

                    //Timur ST
                    $data1 = $data_lalu_lintas->timur_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->timur_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->timur_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->timur_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->timur_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->timur_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->timur_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->timur_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->timur_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->timur_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->timur_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->timur_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->timur_ST[$i]['becak'];

                    $timur_ST_mc += $data11;
                    $timur_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $timur_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $timur_ST_um += $data12 + $data13;

                    //Timur Kiri
                    $data1 = $data_lalu_lintas->timur_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->timur_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->timur_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->timur_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->timur_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->timur_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->timur_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->timur_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->timur_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->timur_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->timur_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->timur_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->timur_LT[$i]['becak'];

                    $timur_LT_mc += $data11;
                    $timur_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $timur_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $timur_LT_um += $data12 + $data13;
                    //Selatan
                    //Selatan Kanan
                    $data1 = $data_lalu_lintas->selatan_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->selatan_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->selatan_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->selatan_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->selatan_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->selatan_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->selatan_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->selatan_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->selatan_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->selatan_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->selatan_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->selatan_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->selatan_RT[$i]['becak'];

                    $selatan_RT_mc += $data11;
                    $selatan_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $selatan_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $selatan_RT_um += $data12 + $data13;

                    //Selatan Lurus1
                    $data1 = $data_lalu_lintas->selatan_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->selatan_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->selatan_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->selatan_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->selatan_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->selatan_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->selatan_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->selatan_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->selatan_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->selatan_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->selatan_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->selatan_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->selatan_ST[$i]['becak'];

                    $selatan_ST_mc += $data11;
                    $selatan_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $selatan_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $selatan_ST_um += $data12 + $data13;

                    //Selatan LT
                    $data1 = $data_lalu_lintas->selatan_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->selatan_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->selatan_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->selatan_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->selatan_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->selatan_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->selatan_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->selatan_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->selatan_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->selatan_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->selatan_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->selatan_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->selatan_LT[$i]['becak'];

                    $selatan_LT_mc += $data11;
                    $selatan_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $selatan_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $selatan_LT_um += $data12 + $data13;
                    //Barat
                    //Barat Kanan
                    $data1 = $data_lalu_lintas->barat_RT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->barat_RT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->barat_RT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->barat_RT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->barat_RT[$i]['bus'];
                    $data6 = $data_lalu_lintas->barat_RT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->barat_RT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->barat_RT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->barat_RT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->barat_RT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->barat_RT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->barat_RT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->barat_RT[$i]['becak'];

                    $barat_RT_mc += $data11;
                    $barat_RT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $barat_RT_hv += $data5 + $data8 + $data9 + $data10;
                    $barat_RT_um += $data12 + $data13;

                    //Barat ST
                    $data1 =  $data_lalu_lintas->barat_ST[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->barat_ST[$i]['sedan'];
                    $data3 = $data_lalu_lintas->barat_ST[$i]['oplet'];
                    $data4 = $data_lalu_lintas->barat_ST[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->barat_ST[$i]['bus'];
                    $data6 = $data_lalu_lintas->barat_ST[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->barat_ST[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->barat_ST[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->barat_ST[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->barat_ST[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->barat_ST[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->barat_ST[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->barat_ST[$i]['becak'];

                    $barat_ST_mc += $data11;
                    $barat_ST_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $barat_ST_hv += $data5 + $data8 + $data9 + $data10;
                    $barat_ST_um += $data12 + $data13;

                    //Barat LT
                    $data1 = $data_lalu_lintas->barat_LT[$i]['kendaraan_roda_tiga'];
                    $data2 = $data_lalu_lintas->barat_LT[$i]['sedan'];
                    $data3 = $data_lalu_lintas->barat_LT[$i]['oplet'];
                    $data4 = $data_lalu_lintas->barat_LT[$i]['micro_bus'];
                    $data5 = $data_lalu_lintas->barat_LT[$i]['bus'];
                    $data6 = $data_lalu_lintas->barat_LT[$i]['pick_up'];
                    $data7 = $data_lalu_lintas->barat_LT[$i]['micro_truck'];
                    $data8 = $data_lalu_lintas->barat_LT[$i]['truck_as_2'];
                    $data9 = $data_lalu_lintas->barat_LT[$i]['truck_as_3'];
                    $data10 = $data_lalu_lintas->barat_LT[$i]['mobil_tempel_atau_semi_trailer'];
                    $data11 = $data_lalu_lintas->barat_LT[$i]['sepeda_motor'];
                    $data12 = $data_lalu_lintas->barat_LT[$i]['sepeda'];
                    $data13 = $data_lalu_lintas->barat_LT[$i]['becak'];

                    $barat_LT_mc += $data11;
                    $barat_LT_lv += $data1 + $data2 + $data3 + $data4 + $data6 + $data7;
                    $barat_LT_hv += $data5 + $data8 + $data9 + $data10;
                    $barat_LT_um += $data12 + $data13;
                }
            }

            //Perhitungan Ekivalen
            //Utara RT
            $utara_RT_mc_ek = $utara_RT_mc * $mc;
            $utara_RT_lv_ek = $utara_RT_lv * $lv;
            $utara_RT_hv_ek = $utara_RT_hv * $hv;

            //Utara Lurus
            $utara_ST_mc_ek = $utara_ST_mc * $mc;
            $utara_ST_lv_ek = $utara_ST_lv * $lv;
            $utara_ST_hv_ek = $utara_ST_hv * $hv;

            //Utara Kiri
            $utara_LT_mc_ek = $utara_LT_mc * $mc;
            $utara_LT_lv_ek = $utara_LT_lv * $lv;
            $utara_LT_hv_ek = $utara_LT_hv * $hv;

            //Timur Kanan
            $timur_RT_mc_ek = $timur_RT_mc * $mc;
            $timur_RT_lv_ek = $timur_RT_lv * $lv;
            $timur_RT_hv_ek = $timur_RT_hv * $hv;

            //Timur ST
            $timur_ST_mc_ek = $timur_ST_mc * $mc;
            $timur_ST_lv_ek = $timur_ST_lv * $lv;
            $timur_ST_hv_ek = $timur_ST_hv * $hv;

            //Timur Kiri
            $timur_LT_mc_ek = $timur_LT_mc * $mc;
            $timur_LT_lv_ek = $timur_LT_lv * $lv;
            $timur_LT_hv_ek = $timur_LT_hv * $hv;


            //selatan Kanan
            $selatan_RT_mc_ek = $selatan_RT_mc * $mc;
            $selatan_RT_lv_ek = $selatan_RT_lv * $lv;
            $selatan_RT_hv_ek = $selatan_RT_hv * $hv;

            //selatan ST
            $selatan_ST_mc_ek = $selatan_ST_mc * $mc;
            $selatan_ST_lv_ek = $selatan_ST_lv * $lv;
            $selatan_ST_hv_ek = $selatan_ST_hv * $hv;

            //selatan Kiri
            $selatan_LT_mc_ek = $selatan_LT_mc * $mc;
            $selatan_LT_lv_ek = $selatan_LT_lv * $lv;
            $selatan_LT_hv_ek = $selatan_LT_hv * $hv;

            //barat Kanan
            $barat_RT_mc_ek = $barat_RT_mc * $mc;
            $barat_RT_lv_ek = $barat_RT_lv * $lv;
            $barat_RT_hv_ek = $barat_RT_hv * $hv;

            //barat ST
            $barat_ST_mc_ek = $barat_ST_mc * $mc;
            $barat_ST_lv_ek = $barat_ST_lv * $lv;
            $barat_ST_hv_ek = $barat_ST_hv * $hv;

            //barat LT
            $barat_LT_mc_ek = $barat_LT_mc * $mc;
            $barat_LT_lv_ek = $barat_LT_lv * $lv;
            $barat_LT_hv_ek = $barat_LT_hv * $hv;

            //Total Dengan Menggunakan Ekivalen
            //Utara
            $total_mc_utara_ek = $utara_RT_mc_ek + $utara_ST_mc_ek + $utara_LT_mc_ek;
            $total_lv_utara_ek = $utara_RT_lv_ek + $utara_ST_lv_ek + $utara_LT_lv_ek;
            $total_hv_utara_ek = $utara_RT_hv_ek + $utara_ST_hv_ek + $utara_LT_hv_ek;
            $total_utara_ek = $total_mc_utara_ek + $total_lv_utara_ek + $total_hv_utara_ek;

            //Timur
            $total_mc_timur_ek = $timur_RT_mc_ek + $timur_ST_mc_ek + $timur_LT_mc_ek;
            $total_lv_timur_ek = $timur_RT_lv_ek + $timur_ST_lv_ek + $timur_LT_lv_ek;
            $total_hv_timur_ek = $timur_RT_hv_ek + $timur_ST_hv_ek + $timur_LT_hv_ek;
            $total_timur_ek = $total_mc_timur_ek + $total_lv_timur_ek + $total_hv_timur_ek;

            //selatan
            $total_mc_selatan_ek = $selatan_RT_mc_ek + $selatan_ST_mc_ek + $selatan_LT_mc_ek;
            $total_lv_selatan_ek = $selatan_RT_lv_ek + $selatan_ST_lv_ek + $selatan_LT_lv_ek;
            $total_hv_selatan_ek = $selatan_RT_hv_ek + $selatan_ST_hv_ek + $selatan_LT_hv_ek;
            $total_selatan_ek = $total_mc_selatan_ek + $total_lv_selatan_ek + $total_hv_selatan_ek;

            //barat
            $total_mc_barat_ek = $barat_RT_mc_ek + $barat_ST_mc_ek + $barat_LT_mc_ek;
            $total_lv_barat_ek = $barat_RT_lv_ek + $barat_ST_lv_ek + $barat_LT_lv_ek;
            $total_hv_barat_ek = $barat_RT_hv_ek + $barat_ST_hv_ek + $barat_LT_hv_ek;
            $total_barat_ek = $total_mc_barat_ek + $total_lv_barat_ek + $total_hv_barat_ek;

            //Grand Total Dengan Ekivalen
            $grand_total = $total_utara_ek + $total_timur_ek + $total_selatan_ek + $total_barat_ek;

            //Pagi
            if ($jam_awal >= 06.00 && $jam_akhir <= 10.00) {
                if ($grand_total > $pagi_grand_total) {
                    $pagi_grand_total = $grand_total;
                    $data_pagi_jam_puncak = array(
                        'jam_puncak' => $jam_awal . ' - ' . $jam_akhir,
                        'grand_total' => $grand_total,

                        'total_utara' =>  $total_utara_ek,
                        'total_mc_utara' => $total_mc_utara_ek,
                        'total_lv_utara' => $total_lv_utara_ek,
                        'total_hv_utara' => $total_hv_utara_ek,

                        'total_timur' => $total_timur_ek,
                        'total_mc_timur' => $total_mc_timur_ek,
                        'total_lv_timur' => $total_lv_timur_ek,
                        'total_hv_timur' => $total_hv_timur_ek,

                        'total_selatan' => $total_selatan_ek,
                        'total_mc_selatan' => $total_mc_selatan_ek,
                        'total_lv_selatan' => $total_lv_selatan_ek,
                        'total_hv_selatan' => $total_hv_selatan_ek,

                        'total_barat' => $total_barat_ek,
                        'total_mc_barat' => $total_mc_barat_ek,
                        'total_lv_barat' => $total_lv_barat_ek,
                        'total_hv_barat' => $total_hv_barat_ek,
                    );
                }
            }
            //Siang
            if ($jam_awal >= 10.00 && $jam_akhir <= 14.00) {
                if ($grand_total > $siang_grand_total) {
                    $siang_grand_total = $grand_total;
                    $data_siang_jam_puncak = array(
                        'jam_puncak' => $jam_awal . ' - ' . $jam_akhir,
                        'grand_total' => $grand_total,

                        'total_utara' =>  $total_utara_ek,
                        'total_mc_utara' => $total_mc_utara_ek,
                        'total_lv_utara' => $total_lv_utara_ek,
                        'total_hv_utara' => $total_hv_utara_ek,

                        'total_timur' => $total_timur_ek,
                        'total_mc_timur' => $total_mc_timur_ek,
                        'total_lv_timur' => $total_lv_timur_ek,
                        'total_hv_timur' => $total_hv_timur_ek,

                        'total_selatan' => $total_selatan_ek,
                        'total_mc_selatan' => $total_mc_selatan_ek,
                        'total_lv_selatan' => $total_lv_selatan_ek,
                        'total_hv_selatan' => $total_hv_selatan_ek,

                        'total_barat' => $total_barat_ek,
                        'total_mc_barat' => $total_mc_barat_ek,
                        'total_lv_barat' => $total_lv_barat_ek,
                        'total_hv_barat' => $total_hv_barat_ek,

                    );
                }
            }
            //Sore
            if ($jam_awal >= 14.00 && $jam_akhir <= 18.00) {
                if ($grand_total > $sore_grand_total) {
                    $sore_grand_total = $grand_total;
                    $data_sore_jam_puncak = array(
                        'jam_puncak' => $jam_awal . ' - ' . $jam_akhir,
                        'grand_total' => $grand_total,

                        'total_utara' =>  $total_utara_ek,
                        'total_mc_utara' => $total_mc_utara_ek,
                        'total_lv_utara' => $total_lv_utara_ek,
                        'total_hv_utara' => $total_hv_utara_ek,

                        'total_timur' => $total_timur_ek,
                        'total_mc_timur' => $total_mc_timur_ek,
                        'total_lv_timur' => $total_lv_timur_ek,
                        'total_hv_timur' => $total_hv_timur_ek,

                        'total_selatan' => $total_selatan_ek,
                        'total_mc_selatan' => $total_mc_selatan_ek,
                        'total_lv_selatan' => $total_lv_selatan_ek,
                        'total_hv_selatan' => $total_hv_selatan_ek,

                        'total_barat' => $total_barat_ek,
                        'total_mc_barat' => $total_mc_barat_ek,
                        'total_lv_barat' => $total_lv_barat_ek,
                        'total_hv_barat' => $total_hv_barat_ek
                    );
                }
            }
            //Malam
            if ($jam_awal >= 18.00 || $jam_awal <= 06.00) {
                if ($grand_total > $malam_grand_total) {
                    $malam_grand_total = $grand_total;
                    $data_malam_jam_puncak = array(
                        'jam_puncak' => $jam_awal . ' - ' . $jam_akhir,
                        'grand_total' => $grand_total,

                        'total_utara' =>  $total_utara_ek,
                        'total_mc_utara' => $total_mc_utara_ek,
                        'total_lv_utara' => $total_lv_utara_ek,
                        'total_hv_utara' => $total_hv_utara_ek,

                        'total_timur' => $total_timur_ek,
                        'total_mc_timur' => $total_mc_timur_ek,
                        'total_lv_timur' => $total_lv_timur_ek,
                        'total_hv_timur' => $total_hv_timur_ek,

                        'total_selatan' => $total_selatan_ek,
                        'total_mc_selatan' => $total_mc_selatan_ek,
                        'total_lv_selatan' => $total_lv_selatan_ek,
                        'total_hv_selatan' => $total_hv_selatan_ek,

                        'total_barat' => $total_barat_ek,
                        'total_mc_barat' => $total_mc_barat_ek,
                        'total_lv_barat' => $total_lv_barat_ek,
                        'total_hv_barat' => $total_hv_barat_ek,
                    );
                }
            }

            //Total Seluruh 
            if ($grand_total > $super_grand_total) {
                $periode = $jam_awal . ' - ' . $jam_akhir;
                $super_grand_total = $grand_total;
                //Total

                $utara_RT = $utara_RT_lv + $utara_RT_hv + $utara_RT_mc + $utara_RT_um;
                $utara_ST = $utara_ST_lv + $utara_ST_hv + $utara_ST_mc + $utara_ST_um;
                $utara_LT = $utara_LT_lv + $utara_LT_hv + $utara_LT_mc + $utara_LT_um;

                $timur_RT = $timur_RT_lv + $timur_RT_hv + $timur_RT_mc + $timur_RT_um;
                $timur_ST = $timur_ST_lv + $timur_ST_hv + $timur_ST_mc + $timur_ST_um;
                $timur_LT = $timur_LT_lv + $timur_LT_hv + $timur_LT_mc + $timur_LT_um;

                $selatan_RT = $selatan_RT_lv + $selatan_RT_hv + $selatan_RT_mc + $selatan_RT_um;
                $selatan_ST = $selatan_ST_lv + $selatan_ST_hv + $selatan_ST_mc + $selatan_ST_um;
                $selatan_LT = $selatan_LT_lv + $selatan_LT_hv + $selatan_LT_mc + $selatan_LT_um;

                $barat_RT = $barat_RT_lv + $barat_RT_hv + $barat_RT_mc + $barat_RT_um;
                $barat_ST = $barat_ST_lv + $barat_ST_hv + $barat_ST_mc + $barat_ST_um;
                $barat_LT = $barat_LT_lv + $barat_LT_hv + $barat_LT_mc + $barat_LT_um;

                $pendekat = array(
                    //Utara RT
                    'utara_RT' => $utara_RT,
                    'utara_RT_lv' => $utara_RT_lv,
                    'utara_RT_hv' => $utara_RT_hv,
                    'utara_RT_mc' => $utara_RT_mc,
                    'utara_RT_um' => $utara_RT_um,

                    //Utara Lurus
                    'utara_ST' => $utara_ST,
                    'utara_ST_lv' => $utara_ST_lv,
                    'utara_ST_hv' => $utara_ST_hv,
                    'utara_ST_mc' => $utara_ST_mc,
                    'utara_ST_um' => $utara_ST_um,

                    //Utara Kiri
                    'utara_LT' => $utara_LT,
                    'utara_LT_lv' => $utara_LT_lv,
                    'utara_LT_hv' => $utara_LT_hv,
                    'utara_LT_mc' => $utara_LT_mc,
                    'utara_LT_um' => $utara_LT_um,

                    //Timur Kanan
                    'timur_RT' => $timur_RT,
                    'timur_RT_lv' => $timur_RT_lv,
                    'timur_RT_hv' => $timur_RT_hv,
                    'timur_RT_mc' => $timur_RT_mc,
                    'timur_RT_um' => $timur_RT_um,
                    
                    //Timur ST
                    'timur_ST' => $timur_ST,
                    'timur_ST_lv' => $timur_ST_lv,
                    'timur_ST_hv' => $timur_ST_hv,
                    'timur_ST_mc' => $timur_ST_mc,
                    'timur_ST_um' => $timur_ST_um,
                    //Timur Kiri
                    'timur_LT' => $timur_LT,
                    'timur_LT_lv' => $timur_LT_lv,
                    'timur_LT_hv' => $timur_LT_hv,
                    'timur_LT_mc' => $timur_LT_mc,
                    'timur_LT_um' => $timur_LT_um,

                    //selatan Kanan
                    'selatan_RT' => $selatan_RT,
                    'selatan_RT_lv' => $selatan_RT_lv,
                    'selatan_RT_hv' => $selatan_RT_hv,
                    'selatan_RT_mc' => $selatan_RT_mc,
                    'selatan_RT_um' => $selatan_RT_um,
                    //selatan ST
                    'selatan_ST' => $selatan_ST,
                    'selatan_ST_lv' => $selatan_ST_lv,
                    'selatan_ST_hv' => $selatan_ST_hv,
                    'selatan_ST_mc' => $selatan_ST_mc,
                    'selatan_ST_um' => $selatan_ST_um,
                    //selatan Kiri
                    'selatan_LT' => $selatan_LT,
                    'selatan_LT_lv' => $selatan_LT_lv,
                    'selatan_LT_hv' => $selatan_LT_hv,
                    'selatan_LT_mc' => $selatan_LT_mc,
                    'selatan_LT_um' => $selatan_LT_um,

                    //barat Kanan
                    'barat_RT' => $barat_RT,
                    'barat_RT_lv' => $barat_RT_lv,
                    'barat_RT_hv' => $barat_RT_hv,
                    'barat_RT_mc' => $barat_RT_mc,
                    'barat_RT_um' => $barat_RT_um,
                    //barat ST
                    'barat_ST' => $barat_ST,
                    'barat_ST_lv' => $barat_ST_lv,
                    'barat_ST_hv' => $barat_ST_hv,
                    'barat_ST_mc' => $barat_ST_mc,
                    'barat_ST_um' => $barat_ST_um,
                    //barat LT
                    'barat_LT' => $barat_LT,
                    'barat_LT_lv' => $barat_LT_lv,
                    'barat_LT_hv' => $barat_LT_hv,
                    'barat_LT_mc' => $barat_LT_mc,
                    'barat_LT_um' => $barat_LT_um,
                );
            }
        }

        return view(
            'simpang4::data_lalu_lintas.identifikasi.jam_puncak',
            compact(
                'id',
                'data_simpang',
                'data_pagi_jam_puncak',
                'data_siang_jam_puncak',
                'data_sore_jam_puncak',
                'data_malam_jam_puncak',
                'periode',
                'pendekat'
            )
        );
    }
}
