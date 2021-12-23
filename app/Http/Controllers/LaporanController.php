<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
// use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\Auth;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanMultiSheetExport;
use App\Http\Controllers\Controller;


class LaporanController extends Controller
{
    public function laporan()
    {   
        // member
        User::where("is_mentor", !Auth::user()->is_mentor)->get();
        $group = Group::all();
        // mentor
        // User::where("is_mentor", Auth::user()->is_mentor)->get();
        // dd($user);
        return view('mentor.laporan', [
            "group" => $group
          ]);
    }
    
    private $excel;
    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    // change tahun laporan excel
    public function laporanexport(){
        $nama_file = 'laporan_'.date('Y-m-d').'.xlsx';
        return Excel::download(new LaporanMultiSheetExport(2021), $nama_file);
    }

    // EDIT Mentor
    public function edit(Request $group) {
       $group = Group::all();
    //    $group = Group::all();
       // dd($user);
      
       $group->update([
              "name" => $group->name,
              "description" => $group->description
       ]);

       return back();
    }
}