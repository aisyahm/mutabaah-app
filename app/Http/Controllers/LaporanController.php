<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
// use Maatwebsite\Excel\Excel;
use App\Models\GroupActivity;
use App\Exports\LaporanExport;
// use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel;    
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Exports\MemberMultiSheetExport;
use App\Exports\MentorMultiSheetExport;
use App\Exports\LaporanMultiSheetExport;
use App\Exports\MemberExport;
use App\Exports\MentorExport;

class LaporanController extends Controller
{
    public function laporanMember($user, $group)
    {   
      $user = User::find($user);
      $group = Group::find($group);

      session([
        "user" => $user,
        "group" => $group
      ]);

      return redirect(route("exportlaporanmember"));
    }

    public function laporanMentor(Group $group){
      session([
        "group" => $group
      ]);

      // dd("laporan");

      return redirect(route("exportlaporanmentor"));
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

     // MEMBER ubah tahun terima data disini 2021
    public function memberexport(){
        // return $this->excel->download(new MemberMultiSheetExport(2021), 'member.xlsx');
        return $this->excel->download(new MemberExport(2021), 'member.xlsx');
    }

    // MENTOR ubah tahun terima data disini 2021
    public function mentorexport(){
        return $this->excel->download(new MentorExport(2021), 'mentor.xlsx');
    }
}