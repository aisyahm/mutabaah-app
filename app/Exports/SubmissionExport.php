<?php

namespace App\Exports;

use DateTime;
use App\Models\User;
use App\Models\Group;
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
// use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMapping; //mengelompokkan untuk hide

use Carbon\Carbon;


class SubmissionExport implements WithEvents, WithDrawings, WithCustomStartCell, ShouldAutoSize, FromCollection
// FromCollection FromQuery WithMapping, WithTitle,WithHeadings,FromCollection
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
      $strMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
      $endMonth = Carbon::now()->endOfMonth()->format('Y-m-d');
      $user = session("user");
      $group = session("group");

      $activityUser = GroupActivity::with("submission", "activity")->where("group_id", $group->id)->get();
      foreach ($activityUser as $activities) {
        $activitiesSub = $activities->submission->where("user_id", $user->id)->where("date", ">=", $strMonth)->where("date", "<=", $endMonth);
        // $activitiesSub = $activities->submission->where("user_id", $user->id)
        //                     ->whereYear('created_at', $this->year)
        //                     ->whereMonth('created_at', $this->month);
        
        $activitiesName[] = $activities->activity->name;
        $value = [];
        $userDate = [];
        $userHaid = [];
        
        foreach ($activitiesSub as $activity) {
          $true = "\u{02713}";
          $false = "\u{000D7}";
          $date[] = $activity->date;
          $value[] = $activity->is_done ? json_decode('"'.$true.'"') : json_decode('"'.$false.'"');

          if (count($userHaid) <= count($activitiesSub)) {
            $userHaid[] = $activity->is_haid ? json_decode('"'.$true.'"') : json_decode('"'.$false.'"');
            $userDate[] = $activity->date;
          }
        }
        $userPoint[] = $value;
      }

      $activitiesName = ["Date", ...$activitiesName];
    //   dd($userDate);
      $activitiesName;                                // TABLE HEAD NAME ACTIVITY
      $query = [$userDate, $userPoint, $userHaid];    // DATA VALUE TABLE
      $query = collect($userDate);    // DATA VALUE TABLE
    //   $query = [[$userDate], [$userPoint], [$userHaid]];    // DATA VALUE TABLE

    //   dump($activitiesName);
    //   dd($query);

    return $query;

    // return new Collection([
    //     ['nama','email'], 
    //     [$userDate,$userPoint], 
    // ]);
        // return $query;
        // return $query;
        // $export = new SubmissionExport();
        // return $export->map([$query]);
    }

    // // heading
    // public function headings(): array
    // {
    //     $groupActivity = GroupActivity::with('submission','activity','group')->where("group_id", 1)->get();
    //     foreach ($groupActivity as $activityG) {
    //       $userGroup = $activityG->group->userGroup;
    //       $activities[] = $activityG->activity->name;
    //     }

    //     return ["Nama", ...$activities];
        
        

    //     // return [
    //     //     '#',
    //     //     'Name',
    //     //     'Username',
    //     //     'is_mentor',
    //     //     'Aktivitas',
    //     //     // 'value',
    //     //     'date',
    //     //     'is_haid',
    //     //     'created_at',
    //     //     'updated_at'
    //     // ];
    // }

    // mapping (yang muncul hanya)
    public function map($query): array
    {
        // $haid = $submission->submission->is_haid ? "haid" : "tidak haid";
        // $done = $submission->submission->is_done ? "ngerjain" : "gak ngerjain";
        return [
            // FIELD DALAM EXCEL
            // nama | activity | is_done | date | is_haid
            $query[0],
            $query[2],
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
                $event->sheet->getStyle('B8:G13')
                ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
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

    // // nama bulan di multipleexport
    // public function title(): string
    // {
    //     return DateTime::createFromFormat('!m', $this->month)->format('F');
    // }
}
