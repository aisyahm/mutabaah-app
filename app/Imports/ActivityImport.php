<?php

namespace App\Imports;

use App\Models\Activity;
use Maatwebsite\Excel\Concerns\ToModel;

class ActivityImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Activity([
            // import excel
            // row 1 karena berdasarkan table excel nama yaitu 1 karena dimulai dari 0
            'name' => $row[1],
            'max_value' => $row[2],
            'unit' => $row[3],
        ]);
    }
}
