<?php

namespace Modules\Simpang4\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Simpang4\Entities\DataLaluLintas;
use Modules\Simpang4\Entities\Simpang4;

class DataLaluLintasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data_lalu_lintas = DataLaluLintas::get();
        $data_simpang = Simpang4::get();
        return view('simpang4::data_lalu_lintas.index', compact('data_lalu_lintas', 'data_simpang'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data_simpang = Simpang4::orderby('updated_at', 'desc')->get();
        return view('simpang4::data_lalu_lintas.create', compact('data_simpang'))
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

        $utara_RT = array();
        $utara_ST = array();
        $utara_LT = array();
        $timur_RT = array();
        $timur_ST = array();
        $timur_LT = array();
        $selatan_RT = array();
        $selatan_ST = array();
        $selatan_LT = array();
        $barat_RT = array();
        $barat_ST = array();
        $barat_LT = array();

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
            $utara_RT[] = $row;
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
            $utara_ST[] = $row;
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
            $utara_LT[] = $row;
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
            $timur_RT[] = $row;
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
            $timur_ST[] = $row;
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
            $timur_LT[] = $row;
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
            $selatan_RT[] = $row;
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
            $selatan_ST[] = $row;
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
            $selatan_LT[] = $row;
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
            $barat_RT[] = $row;
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
            $barat_ST[] = $row;
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
            $barat_LT[] = $row;
        }
        DataLaluLintas::where('tgl_survei', $request->get('tgl_survei'))
            ->where('id_simpang', $request->get('id_simpang'))
            ->update([
                'id_simpang' => $request->get('id_simpang'),
                'tgl_survei' => $request->get('tgl_survei'),
                'utara_RT' => $utara_RT,
                'utara_ST' => $utara_ST,
                'utara_LT' => $utara_LT,
                'timur_RT' => $timur_RT,
                'timur_ST' => $timur_ST,
                'timur_LT' => $timur_LT,
                'selatan_RT' => $selatan_RT,
                'selatan_ST' => $selatan_ST,
                'selatan_LT' => $selatan_LT,
                'barat_RT' => $barat_RT,
                'barat_ST' => $barat_ST,
                'barat_LT' => $barat_LT,
            ], ['upsert' => true]);
        File::delete(public_path('Files/' . $file_name));
        return redirect('/simpang4/data-lalu-lintas')
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
        return view('simpang4::edit');
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

        return redirect('/simpang4/data-lalu-lintas')
            ->with('success', 'Data Simpang berhasil dihapus');
    }
}
