<?php

namespace App\Exports;

use DateTime;
use App\Models\User;
use App\Models\GroupActivity;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;

class LaporanExport implements FromView, ShouldAutoSize, WithDrawings, WithCustomStartCell, WithTitle, WithEvents
{
    use Exportable;
    private $year;
    private $month;

      
    public function __construct(int $year, int $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function view(): View
    {   
        // member    
        // $datas = User::where("is_mentor", !Auth::user()->is_mentor)->with('submission.groupActivity.activity')
        $subActivity = GroupActivity::with("submission")->where("group_id", 1)
        ->whereYear('created_at', $this->year)
        ->whereMonth('created_at', $this->month)->get();
        $subDate = [];
        foreach ($subActivity as $data) {
            $subDate[] = $data->submission;  
        }

        // dd($subDate);
        // mentor
        // $datas = User::where("is_mentor", Auth::user()->is_mentor)->with('submission.groupActivity.activity')
        // ->whereYear('created_at', $this->year)
        // ->whereMonth('created_at', $this->month)
        // ->get();
        // dd($datas);
        return view('mentor.excel.laporan', compact('subDate'));
    }

    public function registerEvents(): array
    {
        return[
            BeforeExport::class => function(BeforeExport $event) {
                $event->writer->getProperties()
                        ->setCreator("Istiqomah Web")
                        ->setLastModifiedBy("Istiqomah Web")
                        ->setTitle("Laporan Aktivitas")
                        ->setSubject("Laporan Aktivitas")
                        ->setDescription(
                            "Laporan dari Pengguna di Website Istiqomah Web"
                        )
                        ->setKeywords("Laporan Istiqomah Web");
            },
            BeforeSheet::class => function(BeforeSheet $event){
                $event->sheet->setCellValue('G3','Laporan Istiqomah Web');
                $event->sheet->setCellValue('G4','Mengenai Salat Wajib dan Sunnah');
            },
            AfterSheet::class => function(AfterSheet $event){
                $event->sheet->getStyle('B9:G9')->applyFromArray([
                    'font' => [
                        'bold' => false,
                        'name' => 'Arial',
                        'size' => 12,
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00A7A0'],
                        ],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ]
                ]);
                $event->sheet->getStyle('G3:G4')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial',
                        'size' => 14,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ]
                ]);
              
                // $event->sheet->getPageSetup()->setHorizontalCentered(true);
                // $event->sheet->getPageSetup()->setVerticalCentered(false);
                // $event->sheet->getPageSetup()->setPrintArea('A1:E2,G4:M20');
                // $event->sheet->getSheetView()->setZoomScale(75);
                // $event->sheet->getDefaultRowDimension()->setRowHeight(50, 'pt');
                $event->sheet->mergeCells('G3:K3');
                $event->sheet->mergeCells('G4:K4');
                $event->sheet->insertNewColumnBefore('A', 1);
                // $event->sheet->getColumnDimension('E')->setCollapsed(true);
                $event->sheet->getStyle(
                    'B9:' . 
                    $event->sheet->getHighestColumn() . 
                    $event->sheet->getHighestRow()
                )->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            }
        ];
    }

    // Logo
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Istiqomah Web');
        $drawing->setDescription('This is Istiqomah Web Logo');
        $drawing->setPath(public_path('assets/img/logo.png'));
        $drawing->setHeight(80);
        $drawing->setCoordinates('B3');

        return $drawing;
    }

    // startcell
    public function startCell(): string
    {
        return 'B7';
    }

    // di multipleexport
    public function title(): string
    {
        return DateTime::createFromFormat('!m', $this->month)->format('F');
    }
}

?>