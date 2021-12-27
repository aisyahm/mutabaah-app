<?php

namespace App\Exports;

use DateTime;
use App\Models\User;
use App\Models\Submission;
use App\Models\GroupActivity;
// use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping; //mengelompokkan untuk hide

class SubmissionExport implements  WithHeadings, WithEvents, WithDrawings, WithCustomStartCell, WithTitle, ShouldAutoSize, FromCollection
// FromCollection FromQuery WithMapping,
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

    // private $submission;

    // Multiple Sheets
    private $year;
    private $month;
    
    public function __construct(int $year, int $month)
    {
        $this->year = $year;
        $this->month = $month;
        // $this->submission = $pts;
    }


    // large data dengan query
    // public function query()
    public function collection()
    {
    

    // return new Collection([
    //     ['nama','hahah']
    // ]);
    
    // [
    //   [
    //     Shidqi,
    //     [5,6,9,10],
    //     7
    //   ],
    //   [
    //     Rizki,
    //     [5,6,9,10],
    //     7
    //   ],
    //   [
    //     Ell,
    //     [5,6,9,10],
    //     7
    //   ],
    // ]


        $query = [];

        $groupActivity = GroupActivity::with('submission','activity','group')->where("group_id", 1)->get();
        foreach ($groupActivity as $activityG) {
          $userGroup = $activityG->group->userGroup;
          $activities[] = $activityG->activity->name;
          $groupActivityId[] = $activityG->id;
          $submission[] = $activityG->submission->where("date", ">=", "2021-11-14")->where("date", "<=", "2021-12-27")->where("user_id", 1);
        }
        
        foreach ($submission as $sub) {
          $value = 0;
            foreach ($sub as $s) {
              $value += $s->is_done;
            }
          $totalSubmission[] = $value;
        }
        dd($totalSubmission);

        foreach ($userGroup as $users) {
          if (!$users->user->is_mentor && $users->is_accept) {
            $user[] = $users->user->name;
          }
        }

        // dd($activities);
        
        for ($i=0; $i < count($user); $i++) { 
          $query[] = [$user[$i], $activities[1]];
        }

        // dd($query);
        
        return new Collection($query);

    //       return new Collection([
    //     ['nama','hahah']
    // ]);
      // session(["user" => $user]);

      // return new Collection($query);

    }
 
    // // mapping (yang muncul hanya)
    // public function map($submission): array
    // {
    //     // $haid = $submission->submission->is_haid ? "haid" : "tidak haid";
    //     // $done = $submission->submission->is_done ? "ngerjain" : "gak ngerjain";
    //     return [
    //         // FIELD DALAM EXCEL
    //         // nama | activity | is_done | date | is_haid
    //         // $submission->group->userGroup->user->name, ,
    //         // $submission->userGroup->id, //karena gak ada id di field group activity
    //         // $submission->activity->name, 
    //         $user, 
    //         // $submission->submission, 
    //         // $submission->submission->is_haid, 
    //     ];
    // }

    // heading
    public function headings(): array
    {
        $groupActivity = GroupActivity::with('submission','activity','group')->where("group_id", 1)->get();
        foreach ($groupActivity as $activityG) {
          $userGroup = $activityG->group->userGroup;
          $activities[] = $activityG->activity->name;
        }

        return ["Nama", ...$activities];
        
        

        // return [
        //     '#',
        //     'Name',
        //     'Username',
        //     'is_mentor',
        //     'Aktivitas',
        //     // 'value',
        //     'date',
        //     'is_haid',
        //     'created_at',
        //     'updated_at'
        // ];
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
                $event->sheet->getStyle(
                    'B7:' . 
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
