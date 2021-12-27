<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupActivity;
// use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\Auth;
use App\Exports\LaporanExport;
// use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel;    
use App\Exports\LaporanMultiSheetExport;
use App\Exports\SubmissionMultiSheetExport;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function laporan()
    {   
        $member = User::where("is_mentor", !Auth::user()->is_mentor)->get();
        // $group = Group::find($group);
        $group = Group::all();
        $user = Auth::user();
        GroupActivity::all();
        // $groupActivity = GroupActivity::where("group_id", 1)->get();
        // $nameActivity = [];

        // foreach ($groupActivity as $group) {
        //     $nameActivity[] = $group->activity->name;
        // }
        // dd($nameActivity);
        
        return view('mentor.laporan', [
            "group" => $group
          ]);
    }
    
    private $excel;
    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    // // change tahun laporan excel
    // public function laporanexport(){
    //     $nama_file = 'laporan_'.date('Y-m-d').'.xlsx';
    //     return Excel::download(new LaporanMultiSheetExport(2021), $nama_file);
    // }

     // ubah tahun terima data disini 2021
     public function laporanexport(){
        return $this->excel->download(new SubmissionMultiSheetExport(2021), 'submission.xlsx');
    }
}