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


class MentorExport implements WithEvents, WithDrawings, WithCustomStartCell, ShouldAutoSize, FromCollection,WithHeadings
// FromQuery WithMapping, WithTitle
{
    // Exportable Trait
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      $group = session("group");
      $strMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
      $endMonth = Carbon::now()->endOfMonth()->format('Y-m-d');
      $activityUser = GroupActivity::with("submission", "activity", "group")->where("group_id", $group->id)->get();
      $userBefore = $activityUser->first()->submission->where("date", ">=", $strMonth)->where("date", "<=", $endMonth)->first()->user->id;
      $memberName = [];
      $userHaid = [];
      $value = 0;
      $haid = 0;
      $i = 1;
      $false = "\u{000D7}";

      foreach ($activityUser as $activities) {
        $activitiesSub = $activities->submission->where("date", ">=", $strMonth)->where("date", "<=", $endMonth);
        $memberGroup = $activities->group->userGroup->where("is_accept", true);
        $activitiesName[] = $activities->activity->name;

        if (!count($memberName)) {
          foreach ($memberGroup as $member) {
            if (!$member->user->is_mentor) $memberName[] = $member->user->name;
          }
        }
        
        foreach ($activitiesSub as $activity) {
          $date[] = $activity->date;
          if ($activity->user->id == $userBefore) {
            $value += $activity->is_done;
            $haid += $activity->is_haid;
          }
          else if ($activity->user->id != $userBefore) {
            if (!array_key_exists($userBefore, $userHaid)) {
              $userHaid[$userBefore] = $haid;
              $haid = 0;
            }

            $userPoint[$userBefore][] = $value;
            $value = 0;
            $userBefore = $activity->user->id;
            if ($activity->user->id == $userBefore) {
              $value += $activity->is_done;
              $haid += $activity->is_haid;

              if (++$i == count($activitiesSub)) {
                $userPoint[$userBefore][] = $value;
              }
            }
          }
        }
      }
      $userPoint[$userBefore][] = $value;

      foreach ($userHaid as $key => $haid) {
        $haidQuery[$key] = $haid == 0 ? json_decode('"'.$false.'"') : "";
      }
      if (count($memberName) != count($userPoint)) {
        for ($i=count($userPoint); $i < count($memberName); $i++) {
          $key = mt_rand(0, 10000);

          for ($j=0; $j <= count($userPoint[$userBefore]); $j++) { 
            // $userPoint[$key][] = 0;
            // $haidQuery[$key] = 0;
            $userPoint[$key][] = json_decode('"'.$false.'"');
            $haidQuery[$key] = json_decode('"'.$false.'"');
          }
        }
      }

      for ($i=0; $i < count($activitiesName); $i++) { 
        $pointQuery = [];
        foreach ($userPoint as $key => $user) {
          $pointQuery[] = $userPoint[$key][$i];
        }
        $userQuery[] = [$activitiesName[$i], ...$pointQuery];
      }

      $memberName = ["Aktivitas", ...$memberName];   // TABLE HEAD NAME MEMBER
      $userQuery[] = ["Haid", ...$haidQuery];        // DATA VALUE TABLE
      return new Collection($userQuery);
    }

    
    public function headings(): array
    {
      $group = session("group");

      $activityUser = GroupActivity::with("submission", "activity", "group")->where("group_id", $group->id)->get();
      $memberName = [];

      foreach ($activityUser as $activities) {
        $memberGroup = $activities->group->userGroup->where("is_accept", true);

        if (!count($memberName)) {
          foreach ($memberGroup as $member) {
            if (!$member->user->is_mentor) $memberName[] = $member->user->name;
          }
        }
      }

      $memberName = ["Aktivitas", ...$memberName];
      
      return $memberName;
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
                $event->sheet->setCellValue('E3','Laporan Grup ' . session("group")->name);
                $event->sheet->setCellValue('E4', 'di bulan ' . Carbon::now()->isoFormat('MMMM'));
            },
            AfterSheet::class => function(AfterSheet $event){
                $event->sheet->getStyle('B8:E8')->applyFromArray([
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
                $event->sheet->getStyle('E3:E4')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'name' => 'Arial',
                        'size' => 14,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ]
                ]);
                $event->sheet->getStyle(  'C9:' . 
                    $event->sheet->getHighestColumn() . 
                    $event->sheet->getHighestRow()
                    )->applyFromArray([
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
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
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
                
                // $event->sheet->getStyle('B8:F13')
                // ->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
                $event->sheet->mergeCells('E3:M3');
                $event->sheet->mergeCells('E4:M4');
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
        $drawing->setCoordinates('B2');

        return $drawing;
    }

    // startcell
    public function startCell(): string
    {
        return 'B8';
    }
}
