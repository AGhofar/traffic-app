<?php

namespace Modules\Simpang3\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Simpang3\Entities\DataLaluLintas;
use Modules\Simpang3\Entities\Simpang3;

class DataLaluLintasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data_lalu_lintas = DataLaluLintas::get();
        $data_simpang = Simpang3::get();
        return view('simpang3::data_lalu_lintas.index', compact('data_lalu_lintas', 'data_simpang'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data_simpang = Simpang3::orderby('updated_at', 'desc')->get();
        return view('simpang3::data_lalu_lintas.create', compact('data_simpang'))
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

        $utara_ST = array();
        $utara_LT = array();
        $timur_RT = array();
        $timur_LT = array();
        $selatan_RT = array();
        $selatan_ST = array();


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
            $utara_ST[] = $row;
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
            $utara_LT[] = $row;
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
            $timur_RT[] = $row;
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
            $timur_LT[] = $row;
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
            $selatan_RT[] = $row;
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
            $selatan_ST[] = $row;
        }
        DataLaluLintas::where('tgl_survei', $request->get('tgl_survei'))
            ->where('id_simpang', $request->get('id_simpang'))
            ->update([
                'id_simpang' => $request->get('id_simpang'),
                'tgl_survei' => $request->get('tgl_survei'),
                'utara_ST' => $utara_ST,
                'utara_LT' => $utara_LT,
                'timur_RT' => $timur_RT,
                'timur_LT' => $timur_LT,
                'selatan_RT' => $selatan_RT,
                'selatan_ST' => $selatan_ST,
            ], ['upsert' => true]);
        File::delete(public_path('Files/' . $file_name));
        return redirect('/simpang3/data-lalu-lintas')
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
        return view('simpang3::edit');
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

        return redirect('/simpang3/data-lalu-lintas')
            ->with('success', 'Data Simpang berhasil dihapus');
    }
}
