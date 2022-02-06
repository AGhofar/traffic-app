<?php

namespace Modules\Simpang5\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Simpang5\Entities\DefaultTimeImport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class FormatDataController extends Controller
{
    public function index()
    {
        return view('simpang5::format_data.index');
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
        $spreadsheet->getActiveSheet()->mergeCells("B1:BA1");
        $sheet->setCellValue('B1', 'LENGAN UTARA');

        $spreadsheet->getActiveSheet()->getStyle('BB1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BB1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BB1:DA1");
        $sheet->setCellValue('BB1', 'LENGAN TIMUR');
        
        $spreadsheet->getActiveSheet()->getStyle('DB1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DB1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("DB1:FA1");
        $sheet->setCellValue('DB1', 'LENGAN SELATAN');

        $spreadsheet->getActiveSheet()->getStyle('FB1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('FB1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("FB1:HA1");
        $sheet->setCellValue('FB1', 'LENGAN BARAT');

        $spreadsheet->getActiveSheet()->getStyle('HB1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('HB1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("HB1:JA1");
        $sheet->setCellValue('HB1', 'LENGAN BARAT LAUT');

        // Nama Jalan
        $spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("B2:BA2");
        $sheet->setCellValue('B2', 'Nama Jalan Utara');

        $spreadsheet->getActiveSheet()->getStyle('BB2')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BB2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BB2:DA2");
        $sheet->setCellValue('BB2', 'Nama Jalan Timur');
        
        $spreadsheet->getActiveSheet()->getStyle('DB2')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DB2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("DB2:FA2");
        $sheet->setCellValue('DB2', 'Nama Jalan Selatan');

        $spreadsheet->getActiveSheet()->getStyle('FB2')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('FB2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("FB2:HA2");
        $sheet->setCellValue('FB2', 'Nama Jalan Barat');

        $spreadsheet->getActiveSheet()->getStyle('HB2')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('HB2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("HB2:JA2");
        $sheet->setCellValue('HB2', 'Nama Jalan Barat Laut');

        //Arah
        // Utara
        $spreadsheet->getActiveSheet()->getStyle('B3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('B3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("B3:N3");
        $sheet->setCellValue('B3', 'Belok Kanan (RT1)');

        $spreadsheet->getActiveSheet()->getStyle('O3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('O3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("O3:AA3");
        $sheet->setCellValue('O3', 'Belok Kanan (RT2)');
        
        $spreadsheet->getActiveSheet()->getStyle('AB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AB3:AN3");
        $sheet->setCellValue('AB3', 'Lurus (ST)');
        
        $spreadsheet->getActiveSheet()->getStyle('AO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AO3:BA3");
        $sheet->setCellValue('AO3', 'Belok Kiri (LT)');

        //Timur
        $spreadsheet->getActiveSheet()->getStyle('BB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BB3:BN3");
        $sheet->setCellValue('BB3', 'Belok Kanan (RT)');

        $spreadsheet->getActiveSheet()->getStyle('BO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BO3:CA3");
        $sheet->setCellValue('BO3', 'Lurus (ST1)');
        
        $spreadsheet->getActiveSheet()->getStyle('CB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("CB3:CN3");
        $sheet->setCellValue('CB3', 'Lurus (ST2)');
        
        $spreadsheet->getActiveSheet()->getStyle('CO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("CO3:DA3");
        $sheet->setCellValue('CO3', 'Belok Kiri (LT)');

        //Selatan
        $spreadsheet->getActiveSheet()->getStyle('DB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("DB3:DN3");
        $sheet->setCellValue('DB3', 'Belok Kanan (RT)');

        $spreadsheet->getActiveSheet()->getStyle('DO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("DO3:EA3");
        $sheet->setCellValue('DO3', 'Lurus (ST1)');
        
        $spreadsheet->getActiveSheet()->getStyle('EB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("EB3:EN3");
        $sheet->setCellValue('EB3', 'Lurus (ST2)');
        
        $spreadsheet->getActiveSheet()->getStyle('EO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("EO3:FA3");
        $sheet->setCellValue('EO3', 'Belok Kiri (LT)');

        //Barat
        $spreadsheet->getActiveSheet()->getStyle('FB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('FB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("FB3:FN3");
        $sheet->setCellValue('FB3', 'Belok Kanan (RT)');

        $spreadsheet->getActiveSheet()->getStyle('FO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('FO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("FO3:GA3");
        $sheet->setCellValue('FO3', 'Lurus (ST)');
        
        $spreadsheet->getActiveSheet()->getStyle('GB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('GB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("GB3:GN3");
        $sheet->setCellValue('GB3', 'Belok Kiri (LT1)');
        
        $spreadsheet->getActiveSheet()->getStyle('GO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('GO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("GO3:HA3");
        $sheet->setCellValue('GO3', 'Belok Kiri (LT2)');

        //Barat Laut
        $spreadsheet->getActiveSheet()->getStyle('HB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('HB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("HB3:HN3");
        $sheet->setCellValue('HB3', 'Belok Kanan (RT)');

        $spreadsheet->getActiveSheet()->getStyle('HO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('HO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("HO3:IA3");
        $sheet->setCellValue('HO3', 'Lurus (ST)');
        
        $spreadsheet->getActiveSheet()->getStyle('IB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('IB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("IB3:IN3");
        $sheet->setCellValue('IB3', 'Belok Kiri (LT1)');
        
        $spreadsheet->getActiveSheet()->getStyle('IO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('IO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("IO3:JA3");
        $sheet->setCellValue('IO3', 'Belok Kiri (LT2)');

        //Dari dan Ke
        //Utara RT1
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
        $sheet->setCellValue('I4', 'Jalan Barat Laut');
        //Utara RT2
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
        $sheet->setCellValue('V4', 'Jalan Barat');
        //Utara ST
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
        $sheet->setCellValue('AI4', 'Jalan Selatan');
        //Utara LT
        $spreadsheet->getActiveSheet()->getStyle('AO4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AO4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AO4:AT4");
        $sheet->setCellValue('AO4', 'Jalan Utara');

        $spreadsheet->getActiveSheet()->getStyle('UH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('UH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('AU4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('AV4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AV4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AV4:BA4");
        $sheet->setCellValue('AV4', 'Jalan Timur');
        
        //Timur RT
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
        $sheet->setCellValue('BI4', 'Jalan Utara');
        //Timur ST1
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
        $sheet->setCellValue('BV4', 'Jalan Barat Laut');
        //Timur ST2
        $spreadsheet->getActiveSheet()->getStyle('CB4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CB4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("CB4:CG4");
        $sheet->setCellValue('CB4', 'Jalan Timur');

        $spreadsheet->getActiveSheet()->getStyle('CH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('CH4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('CI4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CI4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("CI4:CN4");
        $sheet->setCellValue('CI4', 'Jalan Barat');
        //Timur LT
        $spreadsheet->getActiveSheet()->getStyle('CO4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CO4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("CO4:CT4");
        $sheet->setCellValue('CO4', 'Jalan Timur');

        $spreadsheet->getActiveSheet()->getStyle('CH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('CU4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('CV4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('CV4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("CV4:DA4");
        $sheet->setCellValue('DV4', 'Jalan Selatan');
        
        //Selatan RT
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
        $sheet->setCellValue('DI4', 'Jalan Timur');
        //Selatan ST1
        $spreadsheet->getActiveSheet()->getStyle('DO4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DO4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("DO4:DT4");
        $sheet->setCellValue('DO4', 'Jalan Selatan');

        $spreadsheet->getActiveSheet()->getStyle('DU4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DU4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('DU4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('DV4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('DV4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("DV4:EA4");
        $sheet->setCellValue('DV4', 'Jalan Utara');
        //Selatan ST2
        $spreadsheet->getActiveSheet()->getStyle('EB4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EB4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("EB4:EG4");
        $sheet->setCellValue('EB4', 'Jalan Selatan');

        $spreadsheet->getActiveSheet()->getStyle('EH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('EH4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('EI4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EI4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("EI4:EN4");
        $sheet->setCellValue('EI4', 'Jalan Barat Laut');
        //Selatan LT
        $spreadsheet->getActiveSheet()->getStyle('EO4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EO4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("EO4:ET4");
        $sheet->setCellValue('EO4', 'Jalan Selatan');

        $spreadsheet->getActiveSheet()->getStyle('EH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('EU4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('EV4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('EV4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("EV4:FA4");
        $sheet->setCellValue('EV4', 'Jalan Barat');
        
        //Barat RT
        $spreadsheet->getActiveSheet()->getStyle('FB4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('FB4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("FB4:FG4");
        $sheet->setCellValue('FB4', 'Jalan Barat');

        $spreadsheet->getActiveSheet()->getStyle('FH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('FH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('FH4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('FI4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('FI4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("FI4:FN4");
        $sheet->setCellValue('FI4', 'Jalan Selatan');
        //Barat ST
        $spreadsheet->getActiveSheet()->getStyle('FO4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('FO4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("FO4:FT4");
        $sheet->setCellValue('FO4', 'Jalan Barat');

        $spreadsheet->getActiveSheet()->getStyle('FU4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('FU4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('FU4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('FV4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('FV4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("FV4:GA4");
        $sheet->setCellValue('FV4', 'Jalan Timur');
        //Barat LT1
        $spreadsheet->getActiveSheet()->getStyle('GB4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('GB4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("GB4:GG4");
        $sheet->setCellValue('GB4', 'Jalan Barat');

        $spreadsheet->getActiveSheet()->getStyle('GH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('GH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('GH4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('GI4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('GI4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("GI4:GN4");
        $sheet->setCellValue('GI4', 'Jalan Utara');
        //Barat LT2
        $spreadsheet->getActiveSheet()->getStyle('GO4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('GO4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("GO4:GT4");
        $sheet->setCellValue('GO4', 'Jalan Barat');

        $spreadsheet->getActiveSheet()->getStyle('GH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('GH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('GU4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('GV4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('GV4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("GV4:HA4");
        $sheet->setCellValue('GV4', 'Jalan Barat Laut');
        
        //Barat Laut RT
        $spreadsheet->getActiveSheet()->getStyle('HB4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('HB4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("HB4:HG4");
        $sheet->setCellValue('HB4', 'Jalan Barat Laut');

        $spreadsheet->getActiveSheet()->getStyle('HH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('HH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('HH4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('HI4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('HI4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("HI4:HN4");
        $sheet->setCellValue('HI4', 'Jalan Selatan');
        //Barat Laut ST1
        $spreadsheet->getActiveSheet()->getStyle('HO4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('HO4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("HO4:HT4");
        $sheet->setCellValue('HO4', 'Jalan Barat Laut');

        $spreadsheet->getActiveSheet()->getStyle('HU4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('HU4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('HU4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('HV4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('HV4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("HV4:IA4");
        $sheet->setCellValue('HV4', 'Jalan Timur');
        //Barat Laut ST2
        $spreadsheet->getActiveSheet()->getStyle('IB4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('IB4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("IB4:IG4");
        $sheet->setCellValue('IB4', 'Jalan Barat Laut');

        $spreadsheet->getActiveSheet()->getStyle('IH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('IH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('IH4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('II4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('II4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("II4:IN4");
        $sheet->setCellValue('II4', 'Jalan Utara');
        //Barat Laut LT
        $spreadsheet->getActiveSheet()->getStyle('IO4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('IO4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("IO4:IT4");
        $sheet->setCellValue('IO4', 'Jalan Barat Laut');

        $spreadsheet->getActiveSheet()->getStyle('IH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('IH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('IU4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('IV4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('IV4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("IV4:JA4");
        $sheet->setCellValue('IV4', 'Jalan Barat Laut');

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

        //Jenis Kendaraan Timur
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

        //Jenis Kendaraan Selatan
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

        //Jenis Kendaraan Barat
        $sheet->setCellValue('FB5', '1');
        $spreadsheet->getActiveSheet()->getStyle('FB5')->getFont()->setBold(true);
        $sheet->setCellValue('FC5', '2');
        $spreadsheet->getActiveSheet()->getStyle('FC5')->getFont()->setBold(true);
        $sheet->setCellValue('FD5', '3');
        $spreadsheet->getActiveSheet()->getStyle('FD5')->getFont()->setBold(true);
        $sheet->setCellValue('FE5', '4');
        $spreadsheet->getActiveSheet()->getStyle('FE5')->getFont()->setBold(true);
        $sheet->setCellValue('FF5', '5');
        $spreadsheet->getActiveSheet()->getStyle('FF5')->getFont()->setBold(true);
        $sheet->setCellValue('FG5', '6');
        $spreadsheet->getActiveSheet()->getStyle('FG5')->getFont()->setBold(true);
        $sheet->setCellValue('FH5', '7');
        $spreadsheet->getActiveSheet()->getStyle('FH5')->getFont()->setBold(true);
        $sheet->setCellValue('FI5', '8');
        $spreadsheet->getActiveSheet()->getStyle('FI5')->getFont()->setBold(true);
        $sheet->setCellValue('FJ5', '9');
        $spreadsheet->getActiveSheet()->getStyle('FJ5')->getFont()->setBold(true);
        $sheet->setCellValue('FK5', '10');
        $spreadsheet->getActiveSheet()->getStyle('FK5')->getFont()->setBold(true);
        $sheet->setCellValue('FL5', '11');
        $spreadsheet->getActiveSheet()->getStyle('FL5')->getFont()->setBold(true);
        $sheet->setCellValue('FM5', '12');
        $spreadsheet->getActiveSheet()->getStyle('FM5')->getFont()->setBold(true);
        $sheet->setCellValue('FN5', '13');
        $spreadsheet->getActiveSheet()->getStyle('FN5')->getFont()->setBold(true);

        $sheet->setCellValue('FO5', '1');
        $spreadsheet->getActiveSheet()->getStyle('FO5')->getFont()->setBold(true);
        $sheet->setCellValue('FP5', '2');
        $spreadsheet->getActiveSheet()->getStyle('FP5')->getFont()->setBold(true);
        $sheet->setCellValue('FQ5', '3');
        $spreadsheet->getActiveSheet()->getStyle('FQ5')->getFont()->setBold(true);
        $sheet->setCellValue('FR5', '4');
        $spreadsheet->getActiveSheet()->getStyle('FR5')->getFont()->setBold(true);
        $sheet->setCellValue('FS5', '5');
        $spreadsheet->getActiveSheet()->getStyle('FS5')->getFont()->setBold(true);
        $sheet->setCellValue('FT5', '6');
        $spreadsheet->getActiveSheet()->getStyle('FT5')->getFont()->setBold(true);
        $sheet->setCellValue('FU5', '7');
        $spreadsheet->getActiveSheet()->getStyle('FU5')->getFont()->setBold(true);
        $sheet->setCellValue('FV5', '8');
        $spreadsheet->getActiveSheet()->getStyle('FV5')->getFont()->setBold(true);
        $sheet->setCellValue('FW5', '9');
        $spreadsheet->getActiveSheet()->getStyle('FW5')->getFont()->setBold(true);
        $sheet->setCellValue('FX5', '10');
        $spreadsheet->getActiveSheet()->getStyle('FX5')->getFont()->setBold(true);
        $sheet->setCellValue('FY5', '11');
        $spreadsheet->getActiveSheet()->getStyle('FY5')->getFont()->setBold(true);
        $sheet->setCellValue('FZ5', '12');
        $spreadsheet->getActiveSheet()->getStyle('FZ5')->getFont()->setBold(true);
        $sheet->setCellValue('GA5', '13');
        $spreadsheet->getActiveSheet()->getStyle('GA5')->getFont()->setBold(true);

        $sheet->setCellValue('GB5', '1');
        $spreadsheet->getActiveSheet()->getStyle('GB5')->getFont()->setBold(true);
        $sheet->setCellValue('GC5', '2');
        $spreadsheet->getActiveSheet()->getStyle('GC5')->getFont()->setBold(true);
        $sheet->setCellValue('GD5', '3');
        $spreadsheet->getActiveSheet()->getStyle('GD5')->getFont()->setBold(true);
        $sheet->setCellValue('GE5', '4');
        $spreadsheet->getActiveSheet()->getStyle('GE5')->getFont()->setBold(true);
        $sheet->setCellValue('GF5', '5');
        $spreadsheet->getActiveSheet()->getStyle('GF5')->getFont()->setBold(true);
        $sheet->setCellValue('GG5', '6');
        $spreadsheet->getActiveSheet()->getStyle('GG5')->getFont()->setBold(true);
        $sheet->setCellValue('GH5', '7');
        $spreadsheet->getActiveSheet()->getStyle('GH5')->getFont()->setBold(true);
        $sheet->setCellValue('GI5', '8');
        $spreadsheet->getActiveSheet()->getStyle('GI5')->getFont()->setBold(true);
        $sheet->setCellValue('GJ5', '9');
        $spreadsheet->getActiveSheet()->getStyle('GJ5')->getFont()->setBold(true);
        $sheet->setCellValue('GK5', '10');
        $spreadsheet->getActiveSheet()->getStyle('GK5')->getFont()->setBold(true);
        $sheet->setCellValue('GL5', '11');
        $spreadsheet->getActiveSheet()->getStyle('GL5')->getFont()->setBold(true);
        $sheet->setCellValue('GM5', '12');
        $spreadsheet->getActiveSheet()->getStyle('GM5')->getFont()->setBold(true);
        $sheet->setCellValue('GN5', '13');
        $spreadsheet->getActiveSheet()->getStyle('GN5')->getFont()->setBold(true);

        $sheet->setCellValue('GO5', '1');
        $spreadsheet->getActiveSheet()->getStyle('GO5')->getFont()->setBold(true);
        $sheet->setCellValue('GP5', '2');
        $spreadsheet->getActiveSheet()->getStyle('GP5')->getFont()->setBold(true);
        $sheet->setCellValue('GQ5', '3');
        $spreadsheet->getActiveSheet()->getStyle('GQ5')->getFont()->setBold(true);
        $sheet->setCellValue('GR5', '4');
        $spreadsheet->getActiveSheet()->getStyle('GR5')->getFont()->setBold(true);
        $sheet->setCellValue('GS5', '5');
        $spreadsheet->getActiveSheet()->getStyle('GS5')->getFont()->setBold(true);
        $sheet->setCellValue('GT5', '6');
        $spreadsheet->getActiveSheet()->getStyle('GT5')->getFont()->setBold(true);
        $sheet->setCellValue('GU5', '7');
        $spreadsheet->getActiveSheet()->getStyle('GU5')->getFont()->setBold(true);
        $sheet->setCellValue('GV5', '8');
        $spreadsheet->getActiveSheet()->getStyle('GV5')->getFont()->setBold(true);
        $sheet->setCellValue('GW5', '9');
        $spreadsheet->getActiveSheet()->getStyle('GW5')->getFont()->setBold(true);
        $sheet->setCellValue('GX5', '10');
        $spreadsheet->getActiveSheet()->getStyle('GX5')->getFont()->setBold(true);
        $sheet->setCellValue('GY5', '11');
        $spreadsheet->getActiveSheet()->getStyle('GY5')->getFont()->setBold(true);
        $sheet->setCellValue('GZ5', '12');
        $spreadsheet->getActiveSheet()->getStyle('GZ5')->getFont()->setBold(true);
        $sheet->setCellValue('HA5', '13');
        $spreadsheet->getActiveSheet()->getStyle('HA5')->getFont()->setBold(true);
        
        //Jenis Kendaraan Barat Laut
        $sheet->setCellValue('HB5', '1');
        $spreadsheet->getActiveSheet()->getStyle('HB5')->getFont()->setBold(true);
        $sheet->setCellValue('HC5', '2');
        $spreadsheet->getActiveSheet()->getStyle('HC5')->getFont()->setBold(true);
        $sheet->setCellValue('HD5', '3');
        $spreadsheet->getActiveSheet()->getStyle('HD5')->getFont()->setBold(true);
        $sheet->setCellValue('HE5', '4');
        $spreadsheet->getActiveSheet()->getStyle('HE5')->getFont()->setBold(true);
        $sheet->setCellValue('HF5', '5');
        $spreadsheet->getActiveSheet()->getStyle('HF5')->getFont()->setBold(true);
        $sheet->setCellValue('HG5', '6');
        $spreadsheet->getActiveSheet()->getStyle('HG5')->getFont()->setBold(true);
        $sheet->setCellValue('HH5', '7');
        $spreadsheet->getActiveSheet()->getStyle('HH5')->getFont()->setBold(true);
        $sheet->setCellValue('HI5', '8');
        $spreadsheet->getActiveSheet()->getStyle('HI5')->getFont()->setBold(true);
        $sheet->setCellValue('HJ5', '9');
        $spreadsheet->getActiveSheet()->getStyle('HJ5')->getFont()->setBold(true);
        $sheet->setCellValue('HK5', '10');
        $spreadsheet->getActiveSheet()->getStyle('HK5')->getFont()->setBold(true);
        $sheet->setCellValue('HL5', '11');
        $spreadsheet->getActiveSheet()->getStyle('HL5')->getFont()->setBold(true);
        $sheet->setCellValue('HM5', '12');
        $spreadsheet->getActiveSheet()->getStyle('HM5')->getFont()->setBold(true);
        $sheet->setCellValue('HN5', '13');
        $spreadsheet->getActiveSheet()->getStyle('HN5')->getFont()->setBold(true);

        $sheet->setCellValue('HO5', '1');
        $spreadsheet->getActiveSheet()->getStyle('HO5')->getFont()->setBold(true);
        $sheet->setCellValue('HP5', '2');
        $spreadsheet->getActiveSheet()->getStyle('HP5')->getFont()->setBold(true);
        $sheet->setCellValue('HQ5', '3');
        $spreadsheet->getActiveSheet()->getStyle('HQ5')->getFont()->setBold(true);
        $sheet->setCellValue('HR5', '4');
        $spreadsheet->getActiveSheet()->getStyle('HR5')->getFont()->setBold(true);
        $sheet->setCellValue('HS5', '5');
        $spreadsheet->getActiveSheet()->getStyle('HS5')->getFont()->setBold(true);
        $sheet->setCellValue('HT5', '6');
        $spreadsheet->getActiveSheet()->getStyle('HT5')->getFont()->setBold(true);
        $sheet->setCellValue('HU5', '7');
        $spreadsheet->getActiveSheet()->getStyle('HU5')->getFont()->setBold(true);
        $sheet->setCellValue('HV5', '8');
        $spreadsheet->getActiveSheet()->getStyle('HV5')->getFont()->setBold(true);
        $sheet->setCellValue('HW5', '9');
        $spreadsheet->getActiveSheet()->getStyle('HW5')->getFont()->setBold(true);
        $sheet->setCellValue('HX5', '10');
        $spreadsheet->getActiveSheet()->getStyle('HX5')->getFont()->setBold(true);
        $sheet->setCellValue('HY5', '11');
        $spreadsheet->getActiveSheet()->getStyle('HY5')->getFont()->setBold(true);
        $sheet->setCellValue('HZ5', '12');
        $spreadsheet->getActiveSheet()->getStyle('HZ5')->getFont()->setBold(true);
        $sheet->setCellValue('IA5', '13');
        $spreadsheet->getActiveSheet()->getStyle('IA5')->getFont()->setBold(true);

        $sheet->setCellValue('IB5', '1');
        $spreadsheet->getActiveSheet()->getStyle('IB5')->getFont()->setBold(true);
        $sheet->setCellValue('IC5', '2');
        $spreadsheet->getActiveSheet()->getStyle('IC5')->getFont()->setBold(true);
        $sheet->setCellValue('ID5', '3');
        $spreadsheet->getActiveSheet()->getStyle('ID5')->getFont()->setBold(true);
        $sheet->setCellValue('IE5', '4');
        $spreadsheet->getActiveSheet()->getStyle('IE5')->getFont()->setBold(true);
        $sheet->setCellValue('IF5', '5');
        $spreadsheet->getActiveSheet()->getStyle('IF5')->getFont()->setBold(true);
        $sheet->setCellValue('IG5', '6');
        $spreadsheet->getActiveSheet()->getStyle('IG5')->getFont()->setBold(true);
        $sheet->setCellValue('IH5', '7');
        $spreadsheet->getActiveSheet()->getStyle('IH5')->getFont()->setBold(true);
        $sheet->setCellValue('II5', '8');
        $spreadsheet->getActiveSheet()->getStyle('II5')->getFont()->setBold(true);
        $sheet->setCellValue('IJ5', '9');
        $spreadsheet->getActiveSheet()->getStyle('IJ5')->getFont()->setBold(true);
        $sheet->setCellValue('IK5', '10');
        $spreadsheet->getActiveSheet()->getStyle('IK5')->getFont()->setBold(true);
        $sheet->setCellValue('IL5', '11');
        $spreadsheet->getActiveSheet()->getStyle('IL5')->getFont()->setBold(true);
        $sheet->setCellValue('IM5', '12');
        $spreadsheet->getActiveSheet()->getStyle('IM5')->getFont()->setBold(true);
        $sheet->setCellValue('IN5', '13');
        $spreadsheet->getActiveSheet()->getStyle('IN5')->getFont()->setBold(true);

        $sheet->setCellValue('IO5', '1');
        $spreadsheet->getActiveSheet()->getStyle('IO5')->getFont()->setBold(true);
        $sheet->setCellValue('IP5', '2');
        $spreadsheet->getActiveSheet()->getStyle('IP5')->getFont()->setBold(true);
        $sheet->setCellValue('IQ5', '3');
        $spreadsheet->getActiveSheet()->getStyle('IQ5')->getFont()->setBold(true);
        $sheet->setCellValue('IR5', '4');
        $spreadsheet->getActiveSheet()->getStyle('IR5')->getFont()->setBold(true);
        $sheet->setCellValue('IS5', '5');
        $spreadsheet->getActiveSheet()->getStyle('IS5')->getFont()->setBold(true);
        $sheet->setCellValue('IT5', '6');
        $spreadsheet->getActiveSheet()->getStyle('IT5')->getFont()->setBold(true);
        $sheet->setCellValue('IU5', '7');
        $spreadsheet->getActiveSheet()->getStyle('IU5')->getFont()->setBold(true);
        $sheet->setCellValue('IV5', '8');
        $spreadsheet->getActiveSheet()->getStyle('IV5')->getFont()->setBold(true);
        $sheet->setCellValue('IW5', '9');
        $spreadsheet->getActiveSheet()->getStyle('IW5')->getFont()->setBold(true);
        $sheet->setCellValue('IX5', '10');
        $spreadsheet->getActiveSheet()->getStyle('IX5')->getFont()->setBold(true);
        $sheet->setCellValue('IY5', '11');
        $spreadsheet->getActiveSheet()->getStyle('IY5')->getFont()->setBold(true);
        $sheet->setCellValue('IZ5', '12');
        $spreadsheet->getActiveSheet()->getStyle('IZ5')->getFont()->setBold(true);
        $sheet->setCellValue('JA5', '13');
        $spreadsheet->getActiveSheet()->getStyle('JA5')->getFont()->setBold(true);

        $spreadsheet->getActiveSheet()->getStyle("A1:JA5")
            ->getBorders()->getallBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)
            ->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);;

        $row = 6;
        foreach ($data as $value) {
            $sheet->setCellValue('A' . $row, $value->jam_awal . ' - ' . $value->jam_akhir);

            $begin_border = "A" . $row;
            $end_border = "JA" . $row;
            $spreadsheet->getActiveSheet()->getStyle("$begin_border:$end_border")
                ->getBorders()->getallBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)
                ->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);;
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Format-Input Simpang-5.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
