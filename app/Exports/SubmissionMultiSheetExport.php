<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class SubmissionMultiSheetExport implements WithMultipleSheets
{
    private $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function sheets(): array
    {
        $sheets = [];

        for ($month = 1; $month <= 12; $month++) {
            $sheets[] = new SubmissionExport($this->year, $month);
        }
        return $sheets;
    }
}
