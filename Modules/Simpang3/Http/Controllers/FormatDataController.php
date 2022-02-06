<?php

namespace Modules\Simpang3\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Simpang3\Entities\DefaultTimeImport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class FormatDataController extends Controller
{
    public function index()
    {
        return view('simpang3::format_data.index');
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
        $spreadsheet->getActiveSheet()->mergeCells("B1:AA1");
        $sheet->setCellValue('B1', 'LENGAN UTARA');

        $spreadsheet->getActiveSheet()->getStyle('AB1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AB1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AB1:BA1");
        $sheet->setCellValue('AB1', 'LENGAN TIMUR');
        
        $spreadsheet->getActiveSheet()->getStyle('BB1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BB1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BB1:CA1");
        $sheet->setCellValue('BB1', 'LENGAN SELATAN');

        // Nama Jalan
        $spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("B2:AA2");
        $sheet->setCellValue('B2', 'Nama Jalan Utara');

        $spreadsheet->getActiveSheet()->getStyle('AB2')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AB2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AB2:BA2");
        $sheet->setCellValue('AB2', 'Nama Jalan Timur');
        
        $spreadsheet->getActiveSheet()->getStyle('BB2')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BB2')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BB2:CA2");
        $sheet->setCellValue('BB2', 'Nama Jalan Selatan');

        //Arah
        // Utara
        $spreadsheet->getActiveSheet()->getStyle('B3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('B3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("B3:N3");
        $sheet->setCellValue('B3', 'Lurus (ST)');

        $spreadsheet->getActiveSheet()->getStyle('O3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('O3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("O3:AA3");
        $sheet->setCellValue('O3', 'Belok Kiri (LT)');
        
        //Timur
        $spreadsheet->getActiveSheet()->getStyle('AB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AB3:AN3");
        $sheet->setCellValue('AB3', 'Belok Kanan (RT)');
        
        $spreadsheet->getActiveSheet()->getStyle('AO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AO3:BA3");
        $sheet->setCellValue('AO3', 'Belok Kiri (LT)');

        //Selatan
        $spreadsheet->getActiveSheet()->getStyle('BB3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BB3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BB3:BN3");
        $sheet->setCellValue('BB3', 'Belok Kanan (RT)');

        $spreadsheet->getActiveSheet()->getStyle('BO3')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BO3')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BO3:CA3");
        $sheet->setCellValue('BO3', 'Lurus (ST)');

        //Dari dan Ke
        //Utara ST
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
        $sheet->setCellValue('I4', 'Jalan Selatan');
        //Utara LT
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
        $sheet->setCellValue('V4', 'Jalan Timur');

        //Timur RT
        $spreadsheet->getActiveSheet()->getStyle('AB4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AB4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AB4:AG4");
        $sheet->setCellValue('AB4', 'Jalan Timur');

        $spreadsheet->getActiveSheet()->getStyle('AH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('AH4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('AI4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('AI4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("AI4:AN4");
        $sheet->setCellValue('AI4', 'Jalan Utara');
        //Timur LT
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
        $sheet->setCellValue('AV4', 'Jalan Selatan');

        //Selatan RT
        $spreadsheet->getActiveSheet()->getStyle('BB4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BB4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BB4:BG4");
        $sheet->setCellValue('BB4', 'Jalan Selatan');

        $spreadsheet->getActiveSheet()->getStyle('BH4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BH4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('BH4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('BI4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BI4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BI4:BN4");
        $sheet->setCellValue('BI4', 'Jalan Timur');
        //Selatan ST
        $spreadsheet->getActiveSheet()->getStyle('BO4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BO4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BO4:BT4");
        $sheet->setCellValue('BO4', 'Jalan Selatan');

        $spreadsheet->getActiveSheet()->getStyle('BU4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BU4')->getAlignment()->setHorizontal('center');
        $sheet->setCellValue('BU4', 'Ke');

        $spreadsheet->getActiveSheet()->getStyle('BV4')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('BV4')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("BV4:CA4");
        $sheet->setCellValue('BV4', 'Jalan Utara');

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

        // Jenis Kendaraan Timur
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

        // Jenis Kendaraan Selatan
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

        $spreadsheet->getActiveSheet()->getStyle("A1:CA5")
            ->getBorders()->getallBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)
            ->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);;

        $row = 6;
        foreach ($data as $value) {
            $sheet->setCellValue('A' . $row, $value->jam_awal . ' - ' . $value->jam_akhir);

            $begin_border = "A" . $row;
            $end_border = "CA" . $row;
            $spreadsheet->getActiveSheet()->getStyle("$begin_border:$end_border")
                ->getBorders()->getallBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN)
                ->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);;
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Format-Input Simpang-3.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
