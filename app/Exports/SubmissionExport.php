<?php

namespace App\Exports;

use App\Models\Submission;
use DateTime;
// use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithMapping; //mengelompokkan untuk hide
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\BeforeSheet;

class SubmissionExport implements ShouldAutoSize, WithMapping, WithHeadings, WithEvents, FromQuery, WithDrawings, WithCustomStartCell, WithTitle
// FromCollection
{
    // Exportable Trait
    use Exportable;

    // Responsable Interface (simple)
    // private $fileName = "activity.xlsx";
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Submission::all();
    // }

    // Multiple Sheets
    private $year;
    private $month;
    
    public function __construct(int $year, int $month)
    {
        $this->year = $year;
        $this->month = $month;
    }


    // large data dengan query
    public function query()
    {
    //   return Submission::with('activity','user')->first();
      return Submission::query()->with('activity','user')
      ->whereYear('created_at', $this->year)
      ->whereMonth('created_at', $this->month);
        // dd($submission);

    //   return Submission::where('id','>',10)->with('activity','user')
    //   ->whereYear('created_at', $this->year)
    //   ->whereMonth('created_at', $this->month);
    //     // dd($submission);
    }
 
    // mapping (yang muncul hanya)
    public function map($submission): array
    {
        return [
            $submission->id,
            $submission->user->name,
            $submission->user->username,
            $submission->user->is_mentor,
            $submission->activity->name,
            $submission->date,
            $submission->is_haid,
            $submission->created_at,
            $submission->updated_at
        ];
    }

    // heading
    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Username',
            'is_mentor',
            'Aktivitas',
            // 'value',
            'date',
            'is_haid',
            'created_at',
            'updated_at'
        ];
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
                $event->sheet->setCellValue('F3','Laporan Istiqomah Web');
                $event->sheet->setCellValue('F4','Mengenai Salat Wajib dan Sunnah');
            },
            AfterSheet::class => function(AfterSheet $event){
                $event->sheet->getStyle('B7:J7')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial',
                        'size' => 11,
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => '00A7A0'],
                        ],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ]
                ]);
                $event->sheet->getStyle('F3:F4')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial',
                        'size' => 14,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ]
                ]);
                $event->sheet->getStyle('B8:J11')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00A7A0'],
                        ],
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => '00A7A0'],
                        ],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_JUSTIFY,
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'rotation' => 90,
                        'startColor' => [
                            'argb' => '#00FFFF',
                        ],
                        'endColor' => [
                            'argb' => '#00FFFF',
                        ],
                    ],
                ]);
              
                // $event->sheet->getPageMargins()->setTop(5);
                // $event->sheet->getPageMargins()->setRight(4.75);
                // $event->sheet->getPageMargins()->setLeft(3.75);
                // $event->sheet->getPageMargins()->setBottom(9);
                // $event->sheet->getPageSetup()->setHorizontalCentered(true);
                // $event->sheet->getPageSetup()->setVerticalCentered(false);
                // $event->sheet->getPageSetup()->setPrintArea('A1:E2,G4:M20');
                // $event->sheet->getSheetView()->setZoomScale(75);
                // $event->sheet->getDefaultRowDimension()->setRowHeight(100, 'pt');
                $event->sheet->mergeCells('F3:J3');
                $event->sheet->mergeCells('F4:J4');
                // $event->sheet->insertNewRowBefore(1, 2);
            }
        ];
    }

    // Logo
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Istiqomah Web');
        $drawing->setDescription('This is Istiqomah Web Logo');
        $drawing->setPath(public_path('/img/Logo Header.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('C2');

        return $drawing;
    }

    // startcell
    public function startCell(): string
    {
        return 'B7';
    }

    // nama bulan di multipleexport
    public function title(): string
    {
        return DateTime::createFromFormat('!m', $this->month)->format('F');
    }
}
