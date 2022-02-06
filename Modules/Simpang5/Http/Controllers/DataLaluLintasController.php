<?php

namespace Modules\Simpang5\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Simpang5\Entities\DataLaluLintas;
use Modules\Simpang5\Entities\Simpang5;

class DataLaluLintasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data_lalu_lintas = DataLaluLintas::get();
        $data_simpang = Simpang5::get();
        return view('simpang5::data_lalu_lintas.index', compact('data_lalu_lintas', 'data_simpang'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data_simpang = Simpang5::orderby('updated_at', 'desc')->get();
        return view('simpang5::data_lalu_lintas.create', compact('data_simpang'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $file_name = $request->get('file_name');
        $arr_file = explode('.', $file_name);
        $extension = end($arr_file);

        if ('csv' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else if ('xls' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $reader->load(public_path('Files/' . $file_name));
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $utara_RT1 = array();
        $utara_RT2 = array();
        $utara_ST = array();
        $utara_LT = array();

        $timur_RT = array();
        $timur_ST1 = array();
        $timur_ST2 = array();
        $timur_LT = array();

        $selatan_RT = array();
        $selatan_ST1 = array();
        $selatan_ST2 = array();
        $selatan_LT = array();

        $barat_RT = array();
        $barat_ST = array();
        $barat_LT1 = array();
        $barat_LT2 = array();

        $barat_laut_RT = array();
        $barat_laut_ST1 = array();
        $barat_laut_ST2 = array();
        $barat_laut_LT = array();

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][1],
                'sedan' => $sheetData[$i][2],
                'oplet' => $sheetData[$i][3],
                'micro_bus' => $sheetData[$i][4],
                'bus' => $sheetData[$i][5],
                'pick_up' => $sheetData[$i][6],
                'micro_truck' => $sheetData[$i][7],
                'truck_as_2' => $sheetData[$i][8],
                'truck_as_3' => $sheetData[$i][9],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][10],
                'sepeda_motor' => $sheetData[$i][11],
                'sepeda' => $sheetData[$i][12],
                'becak' => $sheetData[$i][13],
            );
            $utara_RT1[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][14],
                'sedan' => $sheetData[$i][15],
                'oplet' => $sheetData[$i][16],
                'micro_bus' => $sheetData[$i][17],
                'bus' => $sheetData[$i][18],
                'pick_up' => $sheetData[$i][19],
                'micro_truck' => $sheetData[$i][20],
                'truck_as_2' => $sheetData[$i][21],
                'truck_as_3' => $sheetData[$i][22],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][23],
                'sepeda_motor' => $sheetData[$i][24],
                'sepeda' => $sheetData[$i][25],
                'becak' => $sheetData[$i][26],
            );
            $utara_RT2[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][27],
                'sedan' => $sheetData[$i][28],
                'oplet' => $sheetData[$i][29],
                'micro_bus' => $sheetData[$i][30],
                'bus' => $sheetData[$i][31],
                'pick_up' => $sheetData[$i][32],
                'micro_truck' => $sheetData[$i][33],
                'truck_as_2' => $sheetData[$i][34],
                'truck_as_3' => $sheetData[$i][35],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][36],
                'sepeda_motor' => $sheetData[$i][37],
                'sepeda' => $sheetData[$i][38],
                'becak' => $sheetData[$i][39],
            );
            $utara_ST[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][40],
                'sedan' => $sheetData[$i][41],
                'oplet' => $sheetData[$i][42],
                'micro_bus' => $sheetData[$i][43],
                'bus' => $sheetData[$i][44],
                'pick_up' => $sheetData[$i][45],
                'micro_truck' => $sheetData[$i][46],
                'truck_as_2' => $sheetData[$i][47],
                'truck_as_3' => $sheetData[$i][48],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][49],
                'sepeda_motor' => $sheetData[$i][50],
                'sepeda' => $sheetData[$i][51],
                'becak' => $sheetData[$i][52],
            );
            $utara_LT[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][53],
                'sedan' => $sheetData[$i][54],
                'oplet' => $sheetData[$i][55],
                'micro_bus' => $sheetData[$i][56],
                'bus' => $sheetData[$i][57],
                'pick_up' => $sheetData[$i][58],
                'micro_truck' => $sheetData[$i][59],
                'truck_as_2' => $sheetData[$i][60],
                'truck_as_3' => $sheetData[$i][61],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][62],
                'sepeda_motor' => $sheetData[$i][63],
                'sepeda' => $sheetData[$i][64],
                'becak' => $sheetData[$i][65],
            );
            $timur_RT[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][66],
                'sedan' => $sheetData[$i][67],
                'oplet' => $sheetData[$i][68],
                'micro_bus' => $sheetData[$i][69],
                'bus' => $sheetData[$i][70],
                'pick_up' => $sheetData[$i][71],
                'micro_truck' => $sheetData[$i][72],
                'truck_as_2' => $sheetData[$i][73],
                'truck_as_3' => $sheetData[$i][74],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][75],
                'sepeda_motor' => $sheetData[$i][76],
                'sepeda' => $sheetData[$i][77],
                'becak' => $sheetData[$i][78],
            );
            $timur_ST1[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][79],
                'sedan' => $sheetData[$i][80],
                'oplet' => $sheetData[$i][81],
                'micro_bus' => $sheetData[$i][82],
                'bus' => $sheetData[$i][83],
                'pick_up' => $sheetData[$i][84],
                'micro_truck' => $sheetData[$i][85],
                'truck_as_2' => $sheetData[$i][86],
                'truck_as_3' => $sheetData[$i][87],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][88],
                'sepeda_motor' => $sheetData[$i][89],
                'sepeda' => $sheetData[$i][90],
                'becak' => $sheetData[$i][91],
            );
            $timur_ST2[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][92],
                'sedan' => $sheetData[$i][93],
                'oplet' => $sheetData[$i][94],
                'micro_bus' => $sheetData[$i][95],
                'bus' => $sheetData[$i][96],
                'pick_up' => $sheetData[$i][97],
                'micro_truck' => $sheetData[$i][98],
                'truck_as_2' => $sheetData[$i][99],
                'truck_as_3' => $sheetData[$i][100],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][101],
                'sepeda_motor' => $sheetData[$i][102],
                'sepeda' => $sheetData[$i][103],
                'becak' => $sheetData[$i][104],
            );
            $timur_LT[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][105],
                'sedan' => $sheetData[$i][106],
                'oplet' => $sheetData[$i][107],
                'micro_bus' => $sheetData[$i][108],
                'bus' => $sheetData[$i][109],
                'pick_up' => $sheetData[$i][110],
                'micro_truck' => $sheetData[$i][111],
                'truck_as_2' => $sheetData[$i][112],
                'truck_as_3' => $sheetData[$i][113],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][114],
                'sepeda_motor' => $sheetData[$i][115],
                'sepeda' => $sheetData[$i][116],
                'becak' => $sheetData[$i][117],
            );
            $selatan_RT[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][118],
                'sedan' => $sheetData[$i][119],
                'oplet' => $sheetData[$i][120],
                'micro_bus' => $sheetData[$i][121],
                'bus' => $sheetData[$i][122],
                'pick_up' => $sheetData[$i][123],
                'micro_truck' => $sheetData[$i][124],
                'truck_as_2' => $sheetData[$i][125],
                'truck_as_3' => $sheetData[$i][126],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][127],
                'sepeda_motor' => $sheetData[$i][128],
                'sepeda' => $sheetData[$i][129],
                'becak' => $sheetData[$i][130],
            );
            $selatan_ST1[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][131],
                'sedan' => $sheetData[$i][132],
                'oplet' => $sheetData[$i][133],
                'micro_bus' => $sheetData[$i][134],
                'bus' => $sheetData[$i][135],
                'pick_up' => $sheetData[$i][136],
                'micro_truck' => $sheetData[$i][137],
                'truck_as_2' => $sheetData[$i][138],
                'truck_as_3' => $sheetData[$i][139],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][140],
                'sepeda_motor' => $sheetData[$i][141],
                'sepeda' => $sheetData[$i][142],
                'becak' => $sheetData[$i][143],
            );
            $selatan_ST2[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][144],
                'sedan' => $sheetData[$i][145],
                'oplet' => $sheetData[$i][146],
                'micro_bus' => $sheetData[$i][147],
                'bus' => $sheetData[$i][148],
                'pick_up' => $sheetData[$i][149],
                'micro_truck' => $sheetData[$i][150],
                'truck_as_2' => $sheetData[$i][151],
                'truck_as_3' => $sheetData[$i][152],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][153],
                'sepeda_motor' => $sheetData[$i][154],
                'sepeda' => $sheetData[$i][155],
                'becak' => $sheetData[$i][156],
            );
            $selatan_LT[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][157],
                'sedan' => $sheetData[$i][158],
                'oplet' => $sheetData[$i][159],
                'micro_bus' => $sheetData[$i][160],
                'bus' => $sheetData[$i][161],
                'pick_up' => $sheetData[$i][162],
                'micro_truck' => $sheetData[$i][163],
                'truck_as_2' => $sheetData[$i][164],
                'truck_as_3' => $sheetData[$i][165],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][166],
                'sepeda_motor' => $sheetData[$i][167],
                'sepeda' => $sheetData[$i][168],
                'becak' => $sheetData[$i][169],
            );
            $barat_RT[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][170],
                'sedan' => $sheetData[$i][171],
                'oplet' => $sheetData[$i][172],
                'micro_bus' => $sheetData[$i][173],
                'bus' => $sheetData[$i][174],
                'pick_up' => $sheetData[$i][175],
                'micro_truck' => $sheetData[$i][176],
                'truck_as_2' => $sheetData[$i][177],
                'truck_as_3' => $sheetData[$i][178],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][179],
                'sepeda_motor' => $sheetData[$i][180],
                'sepeda' => $sheetData[$i][181],
                'becak' => $sheetData[$i][182],
            );
            $barat_ST[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][183],
                'sedan' => $sheetData[$i][184],
                'oplet' => $sheetData[$i][185],
                'micro_bus' => $sheetData[$i][186],
                'bus' => $sheetData[$i][187],
                'pick_up' => $sheetData[$i][188],
                'micro_truck' => $sheetData[$i][189],
                'truck_as_2' => $sheetData[$i][190],
                'truck_as_3' => $sheetData[$i][191],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][192],
                'sepeda_motor' => $sheetData[$i][193],
                'sepeda' => $sheetData[$i][194],
                'becak' => $sheetData[$i][195],
            );
            $barat_LT1[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][196],
                'sedan' => $sheetData[$i][197],
                'oplet' => $sheetData[$i][198],
                'micro_bus' => $sheetData[$i][199],
                'bus' => $sheetData[$i][200],
                'pick_up' => $sheetData[$i][201],
                'micro_truck' => $sheetData[$i][202],
                'truck_as_2' => $sheetData[$i][203],
                'truck_as_3' => $sheetData[$i][204],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][205],
                'sepeda_motor' => $sheetData[$i][206],
                'sepeda' => $sheetData[$i][207],
                'becak' => $sheetData[$i][208],
            );
            $barat_LT2[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][209],
                'sedan' => $sheetData[$i][210],
                'oplet' => $sheetData[$i][211],
                'micro_bus' => $sheetData[$i][212],
                'bus' => $sheetData[$i][213],
                'pick_up' => $sheetData[$i][214],
                'micro_truck' => $sheetData[$i][215],
                'truck_as_2' => $sheetData[$i][216],
                'truck_as_3' => $sheetData[$i][217],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][218],
                'sepeda_motor' => $sheetData[$i][219],
                'sepeda' => $sheetData[$i][220],
                'becak' => $sheetData[$i][221],
            );
            $barat_laut_RT[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][222],
                'sedan' => $sheetData[$i][223],
                'oplet' => $sheetData[$i][224],
                'micro_bus' => $sheetData[$i][225],
                'bus' => $sheetData[$i][226],
                'pick_up' => $sheetData[$i][227],
                'micro_truck' => $sheetData[$i][228],
                'truck_as_2' => $sheetData[$i][229],
                'truck_as_3' => $sheetData[$i][230],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][231],
                'sepeda_motor' => $sheetData[$i][232],
                'sepeda' => $sheetData[$i][233],
                'becak' => $sheetData[$i][234],
            );
            $barat_laut_ST1[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][235],
                'sedan' => $sheetData[$i][236],
                'oplet' => $sheetData[$i][237],
                'micro_bus' => $sheetData[$i][238],
                'bus' => $sheetData[$i][239],
                'pick_up' => $sheetData[$i][240],
                'micro_truck' => $sheetData[$i][241],
                'truck_as_2' => $sheetData[$i][242],
                'truck_as_3' => $sheetData[$i][243],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][244],
                'sepeda_motor' => $sheetData[$i][245],
                'sepeda' => $sheetData[$i][246],
                'becak' => $sheetData[$i][247],
            );
            $barat_laut_ST2[] = $row;
        }

        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'kendaraan_roda_tiga' => $sheetData[$i][248],
                'sedan' => $sheetData[$i][249],
                'oplet' => $sheetData[$i][250],
                'micro_bus' => $sheetData[$i][251],
                'bus' => $sheetData[$i][252],
                'pick_up' => $sheetData[$i][253],
                'micro_truck' => $sheetData[$i][254],
                'truck_as_2' => $sheetData[$i][255],
                'truck_as_3' => $sheetData[$i][256],
                'mobil_tempel_atau_semi_trailer' => $sheetData[$i][257],
                'sepeda_motor' => $sheetData[$i][258],
                'sepeda' => $sheetData[$i][259],
                'becak' => $sheetData[$i][260],
            );
            $barat_laut_LT[] = $row;
        }

        DataLaluLintas::where('tgl_survei', $request->get('tgl_survei'))
            ->where('id_simpang', $request->get('id_simpang'))
            ->update([
                'id_simpang' => $request->get('id_simpang'),
                'tgl_survei' => $request->get('tgl_survei'),
                'utara_RT1' => $utara_RT1,
                'utara_RT2' => $utara_RT2,
                'utara_ST' => $utara_ST,
                'utara_LT' => $utara_LT,
                'timur_RT' => $timur_RT,
                'timur_ST1' => $timur_ST1,
                'timur_ST2' => $timur_ST2,
                'timur_LT' => $timur_LT,
                'selatan_RT' => $selatan_RT,
                'selatan_ST1' => $selatan_ST1,
                'selatan_ST2' => $selatan_ST2,
                'selatan_LT' => $selatan_LT,
                'barat_RT' => $barat_RT,
                'barat_ST' => $barat_ST,
                'barat_LT1' => $barat_LT1,
                'barat_LT2' => $barat_LT2,
                'barat_laut_RT' => $barat_laut_RT,
                'barat_laut_ST1' => $barat_laut_ST1,
                'barat_laut_ST2' => $barat_laut_ST2,
                'barat_laut_LT' => $barat_laut_LT,
            ], ['upsert' => true]);

        File::delete(public_path('Files/' . $file_name));
        return redirect('/simpang5/data-lalu-lintas')
            ->with('success', 'Data Lalu Lintas berhasil diperbaharui.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request)
    {
        $data_survei = $request->file('data_survei');
        $file_name = rand() . '.' . $data_survei->getClientOriginalExtension();
        $data_survei->move(public_path('Files'), $file_name);

        $arr_file = explode('.', $file_name);
        $extension = end($arr_file);

        if ('csv' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else if ('xls' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $reader->load(public_path('Files/' . $file_name));
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        $data = array();
        for ($i = 5; $i < count($sheetData); $i++) {
            $jam = explode('-', $sheetData[$i][0]);
            $jam_awal = preg_replace('/\s+/', '', $jam[0]);
            $jam_akhir = preg_replace('/\s+/', '', $jam[1]);
            $row = array(
                'jam_awal' => $jam_awal,
                'jam_akhir' => $jam_akhir,
                'data1' => $sheetData[$i][1],
                'data2' => $sheetData[$i][2],
                'data3' => $sheetData[$i][3],
                'data4' => $sheetData[$i][4],
                'data5' => $sheetData[$i][5],
                'data6' => $sheetData[$i][6],
                'data7' => $sheetData[$i][7],
                'data8' => $sheetData[$i][8],
                'data9' => $sheetData[$i][9],
                'data10' => $sheetData[$i][10],
                'data11' => $sheetData[$i][11],
                'data12' => $sheetData[$i][12],
                'data13' => $sheetData[$i][13],

                'data14' => $sheetData[$i][14],
                'data15' => $sheetData[$i][15],
                'data16' => $sheetData[$i][16],
                'data17' => $sheetData[$i][17],
                'data18' => $sheetData[$i][18],
                'data19' => $sheetData[$i][19],
                'data20' => $sheetData[$i][20],
                'data21' => $sheetData[$i][21],
                'data22' => $sheetData[$i][22],
                'data23' => $sheetData[$i][23],
                'data24' => $sheetData[$i][24],
                'data25' => $sheetData[$i][25],
                'data26' => $sheetData[$i][26],

                'data27' => $sheetData[$i][27],
                'data28' => $sheetData[$i][28],
                'data29' => $sheetData[$i][29],
                'data30' => $sheetData[$i][30],
                'data31' => $sheetData[$i][31],
                'data32' => $sheetData[$i][32],
                'data33' => $sheetData[$i][33],
                'data34' => $sheetData[$i][34],
                'data35' => $sheetData[$i][35],
                'data36' => $sheetData[$i][36],
                'data37' => $sheetData[$i][37],
                'data38' => $sheetData[$i][38],
                'data39' => $sheetData[$i][39],

                'data40' => $sheetData[$i][40],
                'data41' => $sheetData[$i][41],
                'data42' => $sheetData[$i][42],
                'data43' => $sheetData[$i][43],
                'data44' => $sheetData[$i][44],
                'data45' => $sheetData[$i][45],
                'data46' => $sheetData[$i][46],
                'data47' => $sheetData[$i][47],
                'data48' => $sheetData[$i][48],
                'data49' => $sheetData[$i][49],
                'data50' => $sheetData[$i][50],
                'data51' => $sheetData[$i][51],
                'data52' => $sheetData[$i][52],

                'data53' => $sheetData[$i][53],
                'data54' => $sheetData[$i][54],
                'data55' => $sheetData[$i][55],
                'data56' => $sheetData[$i][56],
                'data57' => $sheetData[$i][57],
                'data58' => $sheetData[$i][58],
                'data59' => $sheetData[$i][59],
                'data60' => $sheetData[$i][60],
                'data61' => $sheetData[$i][61],
                'data62' => $sheetData[$i][62],
                'data63' => $sheetData[$i][63],
                'data64' => $sheetData[$i][64],
                'data65' => $sheetData[$i][65],

                'data66' => $sheetData[$i][66],
                'data67' => $sheetData[$i][67],
                'data68' => $sheetData[$i][68],
                'data69' => $sheetData[$i][69],
                'data70' => $sheetData[$i][70],
                'data71' => $sheetData[$i][71],
                'data72' => $sheetData[$i][72],
                'data73' => $sheetData[$i][73],
                'data74' => $sheetData[$i][74],
                'data75' => $sheetData[$i][75],
                'data76' => $sheetData[$i][76],
                'data77' => $sheetData[$i][77],
                'data78' => $sheetData[$i][78],

                'data79' => $sheetData[$i][79],
                'data80' => $sheetData[$i][80],
                'data81' => $sheetData[$i][81],
                'data82' => $sheetData[$i][82],
                'data83' => $sheetData[$i][83],
                'data84' => $sheetData[$i][84],
                'data85' => $sheetData[$i][85],
                'data86' => $sheetData[$i][86],
                'data87' => $sheetData[$i][87],
                'data88' => $sheetData[$i][88],
                'data89' => $sheetData[$i][89],
                'data90' => $sheetData[$i][90],
                'data91' => $sheetData[$i][91],

                'data92' => $sheetData[$i][92],
                'data93' => $sheetData[$i][93],
                'data94' => $sheetData[$i][94],
                'data95' => $sheetData[$i][95],
                'data96' => $sheetData[$i][96],
                'data97' => $sheetData[$i][97],
                'data98' => $sheetData[$i][98],
                'data99' => $sheetData[$i][99],
                'data100' => $sheetData[$i][100],
                'data101' => $sheetData[$i][101],
                'data102' => $sheetData[$i][102],
                'data103' => $sheetData[$i][103],
                'data104' => $sheetData[$i][104],

                'data105' => $sheetData[$i][105],
                'data106' => $sheetData[$i][106],
                'data107' => $sheetData[$i][107],
                'data108' => $sheetData[$i][108],
                'data109' => $sheetData[$i][109],
                'data110' => $sheetData[$i][110],
                'data111' => $sheetData[$i][111],
                'data112' => $sheetData[$i][112],
                'data113' => $sheetData[$i][113],
                'data114' => $sheetData[$i][114],
                'data115' => $sheetData[$i][115],
                'data116' => $sheetData[$i][116],
                'data117' => $sheetData[$i][117],

                'data118' => $sheetData[$i][118],
                'data119' => $sheetData[$i][119],
                'data120' => $sheetData[$i][120],
                'data121' => $sheetData[$i][121],
                'data122' => $sheetData[$i][122],
                'data123' => $sheetData[$i][123],
                'data124' => $sheetData[$i][124],
                'data125' => $sheetData[$i][125],
                'data126' => $sheetData[$i][126],
                'data127' => $sheetData[$i][127],
                'data128' => $sheetData[$i][128],
                'data129' => $sheetData[$i][129],
                'data130' => $sheetData[$i][130],

                'data131' => $sheetData[$i][131],
                'data132' => $sheetData[$i][132],
                'data133' => $sheetData[$i][133],
                'data134' => $sheetData[$i][134],
                'data135' => $sheetData[$i][135],
                'data136' => $sheetData[$i][136],
                'data137' => $sheetData[$i][137],
                'data138' => $sheetData[$i][138],
                'data139' => $sheetData[$i][139],
                'data140' => $sheetData[$i][140],
                'data141' => $sheetData[$i][141],
                'data142' => $sheetData[$i][142],
                'data143' => $sheetData[$i][143],

                'data144' => $sheetData[$i][144],
                'data145' => $sheetData[$i][145],
                'data146' => $sheetData[$i][146],
                'data147' => $sheetData[$i][147],
                'data148' => $sheetData[$i][148],
                'data149' => $sheetData[$i][149],
                'data150' => $sheetData[$i][150],
                'data151' => $sheetData[$i][151],
                'data152' => $sheetData[$i][152],
                'data153' => $sheetData[$i][153],
                'data154' => $sheetData[$i][154],
                'data155' => $sheetData[$i][155],
                'data156' => $sheetData[$i][156],

                'data157' => $sheetData[$i][157],
                'data158' => $sheetData[$i][158],
                'data159' => $sheetData[$i][159],
                'data160' => $sheetData[$i][160],
                'data161' => $sheetData[$i][161],
                'data162' => $sheetData[$i][162],
                'data163' => $sheetData[$i][163],
                'data164' => $sheetData[$i][164],
                'data165' => $sheetData[$i][165],
                'data166' => $sheetData[$i][166],
                'data167' => $sheetData[$i][167],
                'data168' => $sheetData[$i][168],
                'data169' => $sheetData[$i][169],

                'data170' => $sheetData[$i][170],
                'data171' => $sheetData[$i][171],
                'data172' => $sheetData[$i][172],
                'data173' => $sheetData[$i][173],
                'data174' => $sheetData[$i][174],
                'data175' => $sheetData[$i][175],
                'data176' => $sheetData[$i][176],
                'data177' => $sheetData[$i][177],
                'data178' => $sheetData[$i][178],
                'data179' => $sheetData[$i][179],
                'data180' => $sheetData[$i][180],
                'data181' => $sheetData[$i][181],
                'data182' => $sheetData[$i][182],

                'data183' => $sheetData[$i][183],
                'data184' => $sheetData[$i][184],
                'data185' => $sheetData[$i][185],
                'data186' => $sheetData[$i][186],
                'data187' => $sheetData[$i][187],
                'data188' => $sheetData[$i][188],
                'data189' => $sheetData[$i][189],
                'data190' => $sheetData[$i][190],
                'data191' => $sheetData[$i][191],
                'data192' => $sheetData[$i][192],
                'data193' => $sheetData[$i][193],
                'data194' => $sheetData[$i][194],
                'data195' => $sheetData[$i][195],

                'data196' => $sheetData[$i][196],
                'data197' => $sheetData[$i][197],
                'data198' => $sheetData[$i][198],
                'data199' => $sheetData[$i][199],
                'data200' => $sheetData[$i][200],
                'data201' => $sheetData[$i][201],
                'data202' => $sheetData[$i][202],
                'data203' => $sheetData[$i][203],
                'data204' => $sheetData[$i][204],
                'data205' => $sheetData[$i][205],
                'data206' => $sheetData[$i][206],
                'data207' => $sheetData[$i][207],
                'data208' => $sheetData[$i][208],

                'data209' => $sheetData[$i][209],
                'data210' => $sheetData[$i][210],
                'data211' => $sheetData[$i][211],
                'data212' => $sheetData[$i][212],
                'data213' => $sheetData[$i][213],
                'data214' => $sheetData[$i][214],
                'data215' => $sheetData[$i][215],
                'data216' => $sheetData[$i][216],
                'data217' => $sheetData[$i][217],
                'data218' => $sheetData[$i][218],
                'data219' => $sheetData[$i][219],
                'data220' => $sheetData[$i][220],
                'data221' => $sheetData[$i][221],

                'data222' => $sheetData[$i][222],
                'data223' => $sheetData[$i][223],
                'data224' => $sheetData[$i][224],
                'data225' => $sheetData[$i][225],
                'data226' => $sheetData[$i][226],
                'data227' => $sheetData[$i][227],
                'data228' => $sheetData[$i][228],
                'data229' => $sheetData[$i][229],
                'data230' => $sheetData[$i][230],
                'data231' => $sheetData[$i][231],
                'data232' => $sheetData[$i][232],
                'data233' => $sheetData[$i][233],
                'data234' => $sheetData[$i][234],

                'data235' => $sheetData[$i][235],
                'data236' => $sheetData[$i][236],
                'data237' => $sheetData[$i][237],
                'data238' => $sheetData[$i][238],
                'data239' => $sheetData[$i][239],
                'data240' => $sheetData[$i][240],
                'data241' => $sheetData[$i][241],
                'data242' => $sheetData[$i][242],
                'data243' => $sheetData[$i][243],
                'data244' => $sheetData[$i][244],
                'data245' => $sheetData[$i][245],
                'data246' => $sheetData[$i][246],
                'data247' => $sheetData[$i][247],

                'data248' => $sheetData[$i][248],
                'data249' => $sheetData[$i][249],
                'data250' => $sheetData[$i][250],
                'data251' => $sheetData[$i][251],
                'data252' => $sheetData[$i][252],
                'data253' => $sheetData[$i][253],
                'data254' => $sheetData[$i][254],
                'data255' => $sheetData[$i][255],
                'data256' => $sheetData[$i][256],
                'data257' => $sheetData[$i][257],
                'data258' => $sheetData[$i][258],
                'data259' => $sheetData[$i][259],
                'data260' => $sheetData[$i][260],
            );
            $data[] = $row;
        }
        $datas = [
            'data' => $data,
            'file' => $file_name,
        ];
        return response()->json($datas);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('simpang5::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data_lalu_lintas = DataLaluLintas::find($id);
        $data_lalu_lintas->delete();

        return redirect('/simpang5/data-lalu-lintas')
            ->with('success', 'Data Simpang berhasil dihapus');
    }
}
