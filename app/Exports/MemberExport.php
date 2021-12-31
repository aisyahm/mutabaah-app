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


class MemberExport implements WithEvents, WithDrawings, WithCustomStartCell, ShouldAutoSize, FromCollection,WithHeadings
// FromCollection FromQuery WithMapping, WithTitle,FromCollection
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
      $strMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
      $endMonth = Carbon::now()->endOfMonth()->format('Y-m-d');
      $user = session("user");
      $group = session("group");

      $activityUser = GroupActivity::with("submission", "activity")->where("group_id", $group->id)->get();
      foreach ($activityUser as $activities) {
        $activitiesSub = $activities->submission->where("user_id", $user->id)->where("date", ">=", $strMonth)->where("date", "<=", $endMonth);
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

      $activitiesName = ["Date", ...$activitiesName, "Haid"];

      for ($i=0; $i < count($userDate); $i++) { 
        $pointQuery = [];
        for ($j=0; $j < count($userPoint); $j++) { 
          $pointQuery[] = $userPoint[$j][$i];
        }
        $userQuery[] = [$userDate[$i], ...$pointQuery, $userHaid[$i]];
      }

      return new Collection($userQuery);
    }

    // // heading
    public function headings(): array
    {
        $group = session("group");

        $activityUser = GroupActivity::with("submission", "activity")->where("group_id", $group->id)->get();
        foreach ($activityUser as $activities) {
          $activitiesName[] = $activities->activity->name;
        }
        
        return ["Date", ...$activitiesName, "Haid"];
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
                $event->sheet->setCellValue('F3','Laporan ' . session("user")->name);
                $event->sheet->setCellValue('F4', 'Grup ' . session("group")->name . ' di bulan ' . Carbon::now()->isoFormat('MMMM'));
            },
            AfterSheet::class => function(AfterSheet $event){
                $event->sheet->getStyle('B8:J8')->applyFromArray([
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
                $event->sheet->getStyle('B9:J11')->applyFromArray([
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
                $event->sheet->getStyle('B8:G13')
                ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
                $event->sheet->mergeCells('F3:K3');
                $event->sheet->mergeCells('F4:K4');
                // $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->getStyle(
                    'B8:' . 
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
        return 'B8';
    }
}
