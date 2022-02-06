<?php

namespace Modules\Simpang4\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Simpang4\Entities\DefaultTimeImport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class FormatDataController extends Controller
{
    public function index()
    {
        return view('simpang4::format_data.index');
    }

    public function preview(Request $request)
    {
        $jam_awal = str_replace(':', '.', $request->get('jam_awal'));
        $jam_akhir = str_replace(':', '.', $request->get('jam_akhir'));

        $data = "";
        if ($jam_awal == '00.00' && $jam_akhir == '00.00') {
            $data =  DefaultTimeImport::all();
        } else if ($jam_awal > '00.00' && $jam_akhir == '00.00') {
            $data =  DefaultTimeImport::where('jam_awal', '>=', $jam_awal)->get();
        } else {
            $data =  DefaultTimeImport::where('jam_awal', '>=', $jam_awal)
                ->where('jam_akhir', '<=', $jam_akhir)
                ->where('jam_akhir', '!=', '00.00')
                ->get();
        }
        return $data;
    }

    public function excelExport(Request $request)
    {
        $jam_awal = str_replace(':', '.', $request->get('jam_awal'));
        $jam_akhir = str_replace(':', '.', $request->get('jam_akhir'));

        $data = "";
        if ($jam_awal == '00.00' && $jam_akhir == '00.00') {
            $data =  DefaultTimeImport::all();
        } else if ($jam_awal > '00.00' && $jam_akhir == '00.00') {
            $data =  DefaultTimeImport::where('jam_awal', '>=', $jam_awal)->get();
        } else {
            $data =  DefaultTimeImport::where('jam_awal', '>=', $jam_awal)
                ->where('jam_akhir', '<=', $jam_akhir)
                ->where('jam_akhir', '!=', '00.00')
                ->get();
        }

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(12);

        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->mergeCells("A1:A5");
        $sheet->setCellValue('A1', 'Waktu');

        // Lengan
        $spreadsheet->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("B1:AN1");
        $sheet->setCellValue('B1', 'LENGAN UTARA');

        $spreadsheet->getActiveSheet()->getStyle('AO1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AO1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AO1:CA1");
        $sheet->setCellValue('AO1', 'LENGAN TIMUR');
        
        $spreadsheet->getActiveSheet()->getStyle('CB1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CB1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("CB1:DN1");
        $sheet->setCellValue('CB1', 'LENGAN SELATAN');

        $spreadsheet->getActiveSheet()->getStyle('DO1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DO1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("DO1:FA1");
        $sheet->setCellValue('DO1', 'LENGAN BARAT');

        // Nama Jalan
        $spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("B2:AN2");
        $sheet->setCellValue('B2', 'Nama Jalan Utara');

        $spreadsheet->getActiveSheet()->getStyle('AO2')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AO2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AO2:CA2");
        $sheet->setCellValue('AO2', 'Nama Jalan Timur');
        
        $spreadsheet->getActiveSheet()->getStyle('CB2')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CB2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("CB2:DN2");
        $sheet->setCellValue('CB2', 'Nama Jalan Selatan');

        $spreadsheet->getActiveSheet()->getStyle('DO2')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DO2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("DO2:FA2");
        $sheet->setCellValue('DO2', 'Nama Jalan Barat');

        //Arah
        // Utara
        $spreadsheet->getActiveSheet()->getStyle('B3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('B3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("B3:N3");
        $sheet->setCellValue('B3', 'Belok Kanan (RT)');

        $spreadsheet->getActiveSheet()->getStyle('O3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('O3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("O3:AA3");
        $sheet->setCellValue('O3', 'Lurus (ST)');
        
        $spreadsheet->getActiveSheet()->getStyle('AB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AB3:AN3");
        $sheet->setCellValue('AB3', 'Belok Kiri (LT)');
        
        //Timur
        $spreadsheet->getActiveSheet()->getStyle('AO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AO3:BA3");
        $sheet->setCellValue('AO3', 'Belok Kanan (RT)');

        $spreadsheet->getActiveSheet()->getStyle('BB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BB3:BN3");
        $sheet->setCellValue('BB3', 'Lurus (ST)');

        $spreadsheet->getActiveSheet()->getStyle('BO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BO3:CA3");
        $sheet->setCellValue('BO3', 'Belok Kiri (LT)');
        
        //Selatan
        $spreadsheet->getActiveSheet()->getStyle('CB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("CB3:CN3");
        $sheet->setCellValue('CB3', 'Belok Kanan (RT)');
        
        $spreadsheet->getActiveSheet()->getStyle('CO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("CO3:DA3");
        $sheet->setCellValue('CO3', 'Lurus (ST)');

        $spreadsheet->getActiveSheet()->getStyle('DB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("DB3:DN3");
        $sheet->setCellValue('DB3', 'Belok Kiri (LT)');

        //Barat
        $spreadsheet->getActiveSheet()->getStyle('DO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("DO3:EA3");
        $sheet->setCellValue('DO3', 'Belok Kanan (RT)');
        
        $spreadsheet->getActiveSheet()->getStyle('EB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("EB3:EN3");
        $sheet->setCellValue('EB3', 'Lurus (ST)');
        
        $spreadsheet->getActiveSheet()->getStyle('EO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("EO3:FA3");
        $sheet->setCellValue('EO3', 'Belok Kiri (LT)');

        //Dari dan Ke
        //Utara RT
        $spreadsheet->getActiveSheet()->getStyle('B4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("B4:G4");
        $sheet->setCellValue('B4', 'Jalan Utara');

        $spreadsheet->getActiveSheet()->getStyle('H4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('H4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('H4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('I4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('I4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("I4:N4");
        $sheet->setCellValue('I4', 'Jalan Barat');
        //Utara ST
        $spreadsheet->getActiveSheet()->getStyle('O4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('O4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("O4:T4");
        $sheet->setCellValue('O4', 'Jalan Utara');

        $spreadsheet->getActiveSheet()->getStyle('U4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('U4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('U4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('V4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('V4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("V4:AA4");
        $sheet->setCellValue('V4', 'Jalan Selatan');
        //Utara LT
        $spreadsheet->getActiveSheet()->getStyle('AB4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AB4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AB4:AG4");
        $sheet->setCellValue('AB4', 'Jalan Utara');

        $spreadsheet->getActiveSheet()->getStyle('AH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('AH4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('AI4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AI4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AI4:AN4");
        $sheet->setCellValue('AI4', 'Jalan Timur');

        //Timur RT
        $spreadsheet->getActiveSheet()->getStyle('AO4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AO4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AO4:AT4");
        $sheet->setCellValue('AO4', 'Jalan Timur');

        $spreadsheet->getActiveSheet()->getStyle('UH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('UH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('AU4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('AV4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AV4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AV4:BA4");
        $sheet->setCellValue('AV4', 'Jalan Utara');
        //Timur ST
        $spreadsheet->getActiveSheet()->getStyle('BB4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BB4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BB4:BG4");
        $sheet->setCellValue('BB4', 'Jalan Timur');

        $spreadsheet->getActiveSheet()->getStyle('BH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('BH4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('BI4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BI4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BI4:BN4");
        $sheet->setCellValue('BI4', 'Jalan Barat');
        //Timur LT
        $spreadsheet->getActiveSheet()->getStyle('BO4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BO4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BO4:BT4");
        $sheet->setCellValue('BO4', 'Jalan Timur');

        $spreadsheet->getActiveSheet()->getStyle('BU4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BU4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('BU4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('BV4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BV4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BV4:CA4");
        $sheet->setCellValue('BV4', 'Jalan Selatan');

        //Selatan RT
        $spreadsheet->getActiveSheet()->getStyle('CB4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CB4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("CB4:CG4");
        $sheet->setCellValue('CB4', 'Jalan Selatan');

        $spreadsheet->getActiveSheet()->getStyle('CH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('CH4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('CI4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CI4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("CI4:CN4");
        $sheet->setCellValue('CI4', 'Jalan Timur');
        //Selatan ST
        $spreadsheet->getActiveSheet()->getStyle('CO4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CO4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("CO4:CT4");
        $sheet->setCellValue('CO4', 'Jalan Selatan');

        $spreadsheet->getActiveSheet()->getStyle('CH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('CU4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('CV4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CV4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("CV4:DA4");
        $sheet->setCellValue('DV4', 'Jalan Utara');
        //Selatan LT
        $spreadsheet->getActiveSheet()->getStyle('DB4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DB4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("DB4:DG4");
        $sheet->setCellValue('DB4', 'Jalan Selatan');

        $spreadsheet->getActiveSheet()->getStyle('DH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('DH4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('DI4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DI4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("DI4:DN4");
        $sheet->setCellValue('DI4', 'Jalan Barat');

        //Barat RT
        $spreadsheet->getActiveSheet()->getStyle('DO4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DO4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("DO4:DT4");
        $sheet->setCellValue('DO4', 'Jalan Barat');

        $spreadsheet->getActiveSheet()->getStyle('DU4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DU4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('DU4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('DV4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DV4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("DV4:EA4");
        $sheet->setCellValue('DV4', 'Jalan Selatan');
        //Barat ST
        $spreadsheet->getActiveSheet()->getStyle('EB4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EB4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("EB4:EG4");
        $sheet->setCellValue('EB4', 'Jalan Barat');

        $spreadsheet->getActiveSheet()->getStyle('EH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('EH4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('EI4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EI4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("EI4:EN4");
        $sheet->setCellValue('EI4', 'Jalan Timur');
        //Barat LT
        $spreadsheet->getActiveSheet()->getStyle('EO4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EO4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("EO4:ET4");
        $sheet->setCellValue('EO4', 'Jalan Barat');

        $spreadsheet->getActiveSheet()->getStyle('EH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('EU4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('EV4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EV4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("EV4:FA4");
        $sheet->setCellValue('EV4', 'Jalan Utara');
        
        // Jenis Kendaraan Utara
        $sheet->setCellValue('B5', '1');
        $spreadsheet->getActiveSheet()->getStyle('B5')->getFont()->setBold(true);
        $sheet->setCellValue('C5', '2');
        $spreadsheet->getActiveSheet()->getStyle('C5')->getFont()->setBold(true);
        $sheet->setCellValue('D5', '3');
        $spreadsheet->getActiveSheet()->getStyle('D5')->getFont()->setBold(true);
        $sheet->setCellValue('E5', '4');
        $spreadsheet->getActiveSheet()->getStyle('E5')->getFont()->setBold(true);
        $sheet->setCellValue('F5', '5');
        $spreadsheet->getActiveSheet()->getStyle('F5')->getFont()->setBold(true);
        $sheet->setCellValue('G5', '6');
        $spreadsheet->getActiveSheet()->getStyle('G5')->getFont()->setBold(true);
        $sheet->setCellValue('H5', '7');
        $spreadsheet->getActiveSheet()->getStyle('H5')->getFont()->setBold(true);
        $sheet->setCellValue('I5', '8');
        $spreadsheet->getActiveSheet()->getStyle('I5')->getFont()->setBold(true);
        $sheet->setCellValue('J5', '9');
        $spreadsheet->getActiveSheet()->getStyle('J5')->getFont()->setBold(true);
        $sheet->setCellValue('K5', '10');
        $spreadsheet->getActiveSheet()->getStyle('K5')->getFont()->setBold(true);
        $sheet->setCellValue('L5', '11');
        $spreadsheet->getActiveSheet()->getStyle('L5')->getFont()->setBold(true);
        $sheet->setCellValue('M5', '12');
        $spreadsheet->getActiveSheet()->getStyle('M5')->getFont()->setBold(true);
        $sheet->setCellValue('N5', '13');
        $spreadsheet->getActiveSheet()->getStyle('N5')->getFont()->setBold(true);

        $sheet->setCellValue('O5', '1');
        $spreadsheet->getActiveSheet()->getStyle('O5')->getFont()->setBold(true);
        $sheet->setCellValue('P5', '2');
        $spreadsheet->getActiveSheet()->getStyle('P5')->getFont()->setBold(true);
        $sheet->setCellValue('Q5', '3');
        $spreadsheet->getActiveSheet()->getStyle('Q5')->getFont()->setBold(true);
        $sheet->setCellValue('R5', '4');
        $spreadsheet->getActiveSheet()->getStyle('R5')->getFont()->setBold(true);
        $sheet->setCellValue('S5', '5');
        $spreadsheet->getActiveSheet()->getStyle('S5')->getFont()->setBold(true);
        $sheet->setCellValue('T5', '6');
        $spreadsheet->getActiveSheet()->getStyle('T5')->getFont()->setBold(true);
        $sheet->setCellValue('U5', '7');
        $spreadsheet->getActiveSheet()->getStyle('U5')->getFont()->setBold(true);
        $sheet->setCellValue('V5', '8');
        $spreadsheet->getActiveSheet()->getStyle('V5')->getFont()->setBold(true);
        $sheet->setCellValue('W5', '9');
        $spreadsheet->getActiveSheet()->getStyle('W5')->getFont()->setBold(true);
        $sheet->setCellValue('X5', '10');
        $spreadsheet->getActiveSheet()->getStyle('X5')->getFont()->setBold(true);
        $sheet->setCellValue('Y5', '11');
        $spreadsheet->getActiveSheet()->getStyle('Y5')->getFont()->setBold(true);
        $sheet->setCellValue('Z5', '12');
        $spreadsheet->getActiveSheet()->getStyle('Z5')->getFont()->setBold(true);
        $sheet->setCellValue('AA5', '13');
        $spreadsheet->getActiveSheet()->getStyle('AA5')->getFont()->setBold(true);

        $sheet->setCellValue('AB5', '1');
        $spreadsheet->getActiveSheet()->getStyle('AB5')->getFont()->setBold(true);
        $sheet->setCellValue('AC5', '2');
        $spreadsheet->getActiveSheet()->getStyle('AC5')->getFont()->setBold(true);
        $sheet->setCellValue('AD5', '3');
        $spreadsheet->getActiveSheet()->getStyle('AD5')->getFont()->setBold(true);
        $sheet->setCellValue('AE5', '4');
        $spreadsheet->getActiveSheet()->getStyle('AE5')->getFont()->setBold(true);
        $sheet->setCellValue('AF5', '5');
        $spreadsheet->getActiveSheet()->getStyle('AF5')->getFont()->setBold(true);
        $sheet->setCellValue('AG5', '6');
        $spreadsheet->getActiveSheet()->getStyle('AG5')->getFont()->setBold(true);
        $sheet->setCellValue('AH5', '7');
        $spreadsheet->getActiveSheet()->getStyle('AH5')->getFont()->setBold(true);
        $sheet->setCellValue('AI5', '8');
        $spreadsheet->getActiveSheet()->getStyle('AI5')->getFont()->setBold(true);
        $sheet->setCellValue('AJ5', '9');
        $spreadsheet->getActiveSheet()->getStyle('AJ5')->getFont()->setBold(true);
        $sheet->setCellValue('AK5', '10');
        $spreadsheet->getActiveSheet()->getStyle('AK5')->getFont()->setBold(true);
        $sheet->setCellValue('AL5', '11');
        $spreadsheet->getActiveSheet()->getStyle('AL5')->getFont()->setBold(true);
        $sheet->setCellValue('AM5', '12');
        $spreadsheet->getActiveSheet()->getStyle('AM5')->getFont()->setBold(true);
        $sheet->setCellValue('AN5', '13');
        $spreadsheet->getActiveSheet()->getStyle('AN5')->getFont()->setBold(true);

        // Jenis Kendaraan Timur
        $sheet->setCellValue('AO5', '1');
        $spreadsheet->getActiveSheet()->getStyle('AO5')->getFont()->setBold(true);
        $sheet->setCellValue('AP5', '2');
        $spreadsheet->getActiveSheet()->getStyle('AP5')->getFont()->setBold(true);
        $sheet->setCellValue('AQ5', '3');
        $spreadsheet->getActiveSheet()->getStyle('AQ')->getFont()->setBold(true);
        $sheet->setCellValue('AR5', '4');
        $spreadsheet->getActiveSheet()->getStyle('AR5')->getFont()->setBold(true);
        $sheet->setCellValue('AS5', '5');
        $spreadsheet->getActiveSheet()->getStyle('AS5')->getFont()->setBold(true);
        $sheet->setCellValue('AT5', '6');
        $spreadsheet->getActiveSheet()->getStyle('AT5')->getFont()->setBold(true);
        $sheet->setCellValue('AU5', '7');
        $spreadsheet->getActiveSheet()->getStyle('AU5')->getFont()->setBold(true);
        $sheet->setCellValue('AV5', '8');
        $spreadsheet->getActiveSheet()->getStyle('AV5')->getFont()->setBold(true);
        $sheet->setCellValue('AW5', '9');
        $spreadsheet->getActiveSheet()->getStyle('AW5')->getFont()->setBold(true);
        $sheet->setCellValue('AX5', '10');
        $spreadsheet->getActiveSheet()->getStyle('AX5')->getFont()->setBold(true);
        $sheet->setCellValue('AY5', '11');
        $spreadsheet->getActiveSheet()->getStyle('AY5')->getFont()->setBold(true);
        $sheet->setCellValue('AZ5', '12');
        $spreadsheet->getActiveSheet()->getStyle('AZ5')->getFont()->setBold(true);
        $sheet->setCellValue('BA5', '13');
        $spreadsheet->getActiveSheet()->getStyle('BA5')->getFont()->setBold(true);

        $sheet->setCellValue('BB5', '1');
        $spreadsheet->getActiveSheet()->getStyle('BB5')->getFont()->setBold(true);
        $sheet->setCellValue('BC5', '2');
        $spreadsheet->getActiveSheet()->getStyle('BC5')->getFont()->setBold(true);
        $sheet->setCellValue('BD5', '3');
        $spreadsheet->getActiveSheet()->getStyle('BD5')->getFont()->setBold(true);
        $sheet->setCellValue('BE5', '4');
        $spreadsheet->getActiveSheet()->getStyle('BE5')->getFont()->setBold(true);
        $sheet->setCellValue('BF5', '5');
        $spreadsheet->getActiveSheet()->getStyle('BF5')->getFont()->setBold(true);
        $sheet->setCellValue('BG5', '6');
        $spreadsheet->getActiveSheet()->getStyle('BG5')->getFont()->setBold(true);
        $sheet->setCellValue('BH5', '7');
        $spreadsheet->getActiveSheet()->getStyle('BH5')->getFont()->setBold(true);
        $sheet->setCellValue('BI5', '8');
        $spreadsheet->getActiveSheet()->getStyle('BI5')->getFont()->setBold(true);
        $sheet->setCellValue('BJ5', '9');
        $spreadsheet->getActiveSheet()->getStyle('BJ5')->getFont()->setBold(true);
        $sheet->setCellValue('BK5', '10');
        $spreadsheet->getActiveSheet()->getStyle('BK5')->getFont()->setBold(true);
        $sheet->setCellValue('BL5', '11');
        $spreadsheet->getActiveSheet()->getStyle('BL5')->getFont()->setBold(true);
        $sheet->setCellValue('BM5', '12');
        $spreadsheet->getActiveSheet()->getStyle('BM5')->getFont()->setBold(true);
        $sheet->setCellValue('BN5', '13');
        $spreadsheet->getActiveSheet()->getStyle('BN5')->getFont()->setBold(true);

        $sheet->setCellValue('BO5', '1');
        $spreadsheet->getActiveSheet()->getStyle('BO5')->getFont()->setBold(true);
        $sheet->setCellValue('BP5', '2');
        $spreadsheet->getActiveSheet()->getStyle('BP5')->getFont()->setBold(true);
        $sheet->setCellValue('BQ5', '3');
        $spreadsheet->getActiveSheet()->getStyle('BQ5')->getFont()->setBold(true);
        $sheet->setCellValue('BR5', '4');
        $spreadsheet->getActiveSheet()->getStyle('BR5')->getFont()->setBold(true);
        $sheet->setCellValue('BS5', '5');
        $spreadsheet->getActiveSheet()->getStyle('BS5')->getFont()->setBold(true);
        $sheet->setCellValue('BT5', '6');
        $spreadsheet->getActiveSheet()->getStyle('BT5')->getFont()->setBold(true);
        $sheet->setCellValue('BU5', '7');
        $spreadsheet->getActiveSheet()->getStyle('BU5')->getFont()->setBold(true);
        $sheet->setCellValue('BV5', '8');
        $spreadsheet->getActiveSheet()->getStyle('BV5')->getFont()->setBold(true);
        $sheet->setCellValue('BW5', '9');
        $spreadsheet->getActiveSheet()->getStyle('BW5')->getFont()->setBold(true);
        $sheet->setCellValue('BX5', '10');
        $spreadsheet->getActiveSheet()->getStyle('BX5')->getFont()->setBold(true);
        $sheet->setCellValue('BY5', '11');
        $spreadsheet->getActiveSheet()->getStyle('BY5')->getFont()->setBold(true);
        $sheet->setCellValue('BZ5', '12');
        $spreadsheet->getActiveSheet()->getStyle('BZ5')->getFont()->setBold(true);
        $sheet->setCellValue('CA5', '13');
        $spreadsheet->getActiveSheet()->getStyle('CA5')->getFont()->setBold(true);

        // Jenis Kendaraan Selatan
        $sheet->setCellValue('CB5', '1');
        $spreadsheet->getActiveSheet()->getStyle('CB5')->getFont()->setBold(true);
        $sheet->setCellValue('CC5', '2');
        $spreadsheet->getActiveSheet()->getStyle('CC5')->getFont()->setBold(true);
        $sheet->setCellValue('CD5', '3');
        $spreadsheet->getActiveSheet()->getStyle('CD5')->getFont()->setBold(true);
        $sheet->setCellValue('CE5', '4');
        $spreadsheet->getActiveSheet()->getStyle('CE5')->getFont()->setBold(true);
        $sheet->setCellValue('CF5', '5');
        $spreadsheet->getActiveSheet()->getStyle('CF5')->getFont()->setBold(true);
        $sheet->setCellValue('CG5', '6');
        $spreadsheet->getActiveSheet()->getStyle('CG5')->getFont()->setBold(true);
        $sheet->setCellValue('CH5', '7');
        $spreadsheet->getActiveSheet()->getStyle('CH5')->getFont()->setBold(true);
        $sheet->setCellValue('CI5', '8');
        $spreadsheet->getActiveSheet()->getStyle('CI5')->getFont()->setBold(true);
        $sheet->setCellValue('CJ5', '9');
        $spreadsheet->getActiveSheet()->getStyle('CJ5')->getFont()->setBold(true);
        $sheet->setCellValue('CK5', '10');
        $spreadsheet->getActiveSheet()->getStyle('CK5')->getFont()->setBold(true);
        $sheet->setCellValue('CL5', '11');
        $spreadsheet->getActiveSheet()->getStyle('CL5')->getFont()->setBold(true);
        $sheet->setCellValue('CM5', '12');
        $spreadsheet->getActiveSheet()->getStyle('CM5')->getFont()->setBold(true);
        $sheet->setCellValue('CN5', '13');
        $spreadsheet->getActiveSheet()->getStyle('CN5')->getFont()->setBold(true);

        $sheet->setCellValue('CO5', '1');
        $spreadsheet->getActiveSheet()->getStyle('CO5')->getFont()->setBold(true);
        $sheet->setCellValue('CP5', '2');
        $spreadsheet->getActiveSheet()->getStyle('CP5')->getFont()->setBold(true);
        $sheet->setCellValue('CQ5', '3');
        $spreadsheet->getActiveSheet()->getStyle('CQ5')->getFont()->setBold(true);
        $sheet->setCellValue('CR5', '4');
        $spreadsheet->getActiveSheet()->getStyle('CR5')->getFont()->setBold(true);
        $sheet->setCellValue('CS5', '5');
        $spreadsheet->getActiveSheet()->getStyle('CS5')->getFont()->setBold(true);
        $sheet->setCellValue('CT5', '6');
        $spreadsheet->getActiveSheet()->getStyle('CT5')->getFont()->setBold(true);
        $sheet->setCellValue('CU5', '7');
        $spreadsheet->getActiveSheet()->getStyle('CU5')->getFont()->setBold(true);
        $sheet->setCellValue('CV5', '8');
        $spreadsheet->getActiveSheet()->getStyle('CV5')->getFont()->setBold(true);
        $sheet->setCellValue('CW5', '9');
        $spreadsheet->getActiveSheet()->getStyle('CW5')->getFont()->setBold(true);
        $sheet->setCellValue('CX5', '10');
        $spreadsheet->getActiveSheet()->getStyle('CX5')->getFont()->setBold(true);
        $sheet->setCellValue('CY5', '11');
        $spreadsheet->getActiveSheet()->getStyle('CY5')->getFont()->setBold(true);
        $sheet->setCellValue('CZ5', '12');
        $spreadsheet->getActiveSheet()->getStyle('CZ5')->getFont()->setBold(true);
        $sheet->setCellValue('DA5', '13');
        $spreadsheet->getActiveSheet()->getStyle('DA5')->getFont()->setBold(true);

        $sheet->setCellValue('DB5', '1');
        $spreadsheet->getActiveSheet()->getStyle('DB5')->getFont()->setBold(true);
        $sheet->setCellValue('DC5', '2');
        $spreadsheet->getActiveSheet()->getStyle('DC5')->getFont()->setBold(true);
        $sheet->setCellValue('DD5', '3');
        $spreadsheet->getActiveSheet()->getStyle('DD5')->getFont()->setBold(true);
        $sheet->setCellValue('DE5', '4');
        $spreadsheet->getActiveSheet()->getStyle('DE5')->getFont()->setBold(true);
        $sheet->setCellValue('DF5', '5');
        $spreadsheet->getActiveSheet()->getStyle('DF5')->getFont()->setBold(true);
        $sheet->setCellValue('DG5', '6');
        $spreadsheet->getActiveSheet()->getStyle('DG5')->getFont()->setBold(true);
        $sheet->setCellValue('DH5', '7');
        $spreadsheet->getActiveSheet()->getStyle('DH5')->getFont()->setBold(true);
        $sheet->setCellValue('DI5', '8');
        $spreadsheet->getActiveSheet()->getStyle('DI5')->getFont()->setBold(true);
        $sheet->setCellValue('DJ5', '9');
        $spreadsheet->getActiveSheet()->getStyle('DJ5')->getFont()->setBold(true);
        $sheet->setCellValue('DK5', '10');
        $spreadsheet->getActiveSheet()->getStyle('DK5')->getFont()->setBold(true);
        $sheet->setCellValue('DL5', '11');
        $spreadsheet->getActiveSheet()->getStyle('DL5')->getFont()->setBold(true);
        $sheet->setCellValue('DM5', '12');
        $spreadsheet->getActiveSheet()->getStyle('DM5')->getFont()->setBold(true);
        $sheet->setCellValue('DN5', '13');
        $spreadsheet->getActiveSheet()->getStyle('DN5')->getFont()->setBold(true);

        // Jenis Kendaraan Barat
        $sheet->setCellValue('DO5', '1');
        $spreadsheet->getActiveSheet()->getStyle('DO5')->getFont()->setBold(true);
        $sheet->setCellValue('DP5', '2');
        $spreadsheet->getActiveSheet()->getStyle('DP5')->getFont()->setBold(true);
        $sheet->setCellValue('DQ5', '3');
        $spreadsheet->getActiveSheet()->getStyle('DQ5')->getFont()->setBold(true);
        $sheet->setCellValue('DR5', '4');
        $spreadsheet->getActiveSheet()->getStyle('DR5')->getFont()->setBold(true);
        $sheet->setCellValue('DS5', '5');
        $spreadsheet->getActiveSheet()->getStyle('DS5')->getFont()->setBold(true);
        $sheet->setCellValue('DT5', '6');
        $spreadsheet->getActiveSheet()->getStyle('DT5')->getFont()->setBold(true);
        $sheet->setCellValue('DU5', '7');
        $spreadsheet->getActiveSheet()->getStyle('DU5')->getFont()->setBold(true);
        $sheet->setCellValue('DV5', '8');
        $spreadsheet->getActiveSheet()->getStyle('DV5')->getFont()->setBold(true);
        $sheet->setCellValue('DW5', '9');
        $spreadsheet->getActiveSheet()->getStyle('DW5')->getFont()->setBold(true);
        $sheet->setCellValue('DX5', '10');
        $spreadsheet->getActiveSheet()->getStyle('DX5')->getFont()->setBold(true);
        $sheet->setCellValue('DY5', '11');
        $spreadsheet->getActiveSheet()->getStyle('DY5')->getFont()->setBold(true);
        $sheet->setCellValue('DZ5', '12');
        $spreadsheet->getActiveSheet()->getStyle('DZ5')->getFont()->setBold(true);
        $sheet->setCellValue('EA5', '13');
        $spreadsheet->getActiveSheet()->getStyle('EA5')->getFont()->setBold(true);

        $sheet->setCellValue('EB5', '1');
        $spreadsheet->getActiveSheet()->getStyle('EB5')->getFont()->setBold(true);
        $sheet->setCellValue('EC5', '2');
        $spreadsheet->getActiveSheet()->getStyle('EC5')->getFont()->setBold(true);
        $sheet->setCellValue('ED5', '3');
        $spreadsheet->getActiveSheet()->getStyle('ED5')->getFont()->setBold(true);
        $sheet->setCellValue('EE5', '4');
        $spreadsheet->getActiveSheet()->getStyle('EE5')->getFont()->setBold(true);
        $sheet->setCellValue('EF5', '5');
        $spreadsheet->getActiveSheet()->getStyle('EF5')->getFont()->setBold(true);
        $sheet->setCellValue('EG5', '6');
        $spreadsheet->getActiveSheet()->getStyle('EG5')->getFont()->setBold(true);
        $sheet->setCellValue('EH5', '7');
        $spreadsheet->getActiveSheet()->getStyle('EH5')->getFont()->setBold(true);
        $sheet->setCellValue('EI5', '8');
        $spreadsheet->getActiveSheet()->getStyle('EI5')->getFont()->setBold(true);
        $sheet->setCellValue('EJ5', '9');
        $spreadsheet->getActiveSheet()->getStyle('EJ5')->getFont()->setBold(true);
        $sheet->setCellValue('EK5', '10');
        $spreadsheet->getActiveSheet()->getStyle('EK5')->getFont()->setBold(true);
        $sheet->setCellValue('EL5', '11');
        $spreadsheet->getActiveSheet()->getStyle('EL5')->getFont()->setBold(true);
        $sheet->setCellValue('EM5', '12');
        $spreadsheet->getActiveSheet()->getStyle('EM5')->getFont()->setBold(true);
        $sheet->setCellValue('EN5', '13');
        $spreadsheet->getActiveSheet()->getStyle('EN5')->getFont()->setBold(true);

        $sheet->setCellValue('EO5', '1');
        $spreadsheet->getActiveSheet()->getStyle('EO5')->getFont()->setBold(true);
        $sheet->setCellValue('EP5', '2');
        $spreadsheet->getActiveSheet()->getStyle('EP5')->getFont()->setBold(true);
        $sheet->setCellValue('EQ5', '3');
        $spreadsheet->getActiveSheet()->getStyle('EQ5')->getFont()->setBold(true);
        $sheet->setCellValue('ER5', '4');
        $spreadsheet->getActiveSheet()->getStyle('ER5')->getFont()->setBold(true);
        $sheet->setCellValue('ES5', '5');
        $spreadsheet->getActiveSheet()->getStyle('ES5')->getFont()->setBold(true);
        $sheet->setCellValue('ET5', '6');
        $spreadsheet->getActiveSheet()->getStyle('ET5')->getFont()->setBold(true);
        $sheet->setCellValue('EU5', '7');
        $spreadsheet->getActiveSheet()->getStyle('EU5')->getFont()->setBold(true);
        $sheet->setCellValue('EV5', '8');
        $spreadsheet->getActiveSheet()->getStyle('EV5')->getFont()->setBold(true);
        $sheet->setCellValue('EW5', '9');
        $spreadsheet->getActiveSheet()->getStyle('EW5')->getFont()->setBold(true);
        $sheet->setCellValue('EX5', '10');
        $spreadsheet->getActiveSheet()->getStyle('EX5')->getFont()->setBold(true);
        $sheet->setCellValue('EY5', '11');
        $spreadsheet->getActiveSheet()->getStyle('EY5')->getFont()->setBold(true);
        $sheet->setCellValue('EZ5', '12');
        $spreadsheet->getActiveSheet()->getStyle('EZ5')->getFont()->setBold(true);
        $sheet->setCellValue('FA5', '13');
        $spreadsheet->getActiveSheet()->getStyle('FA5')->getFont()->setBold(true);

        $spreadsheet->getActiveSheet()->getStyle("A1:FA5")
            ->getBorders()->getallBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)
            ->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);;

        $row = 6;
        foreach ($data as $value) {
            $sheet->setCellValue('A' . $row, $value->jam_awal . ' - ' . $value->jam_akhir);

            $begin_border = "A" . $row;
            $end_border = "FA" . $row;
            $spreadsheet->getActiveSheet()->getStyle("$begin_border:$end_border")
                ->getBorders()->getallBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)
                ->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);;
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Format-Input Simpang-4.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
