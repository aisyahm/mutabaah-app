<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $activity = Activity::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
        $months = Activity::select(DB::raw("Month(created_at) as month"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month)
        {
            $datas[$month] = $activity[$index];
        }
        // chart
        return view('mentor.submission',compact('datas'));
    }

    public function barChart()
    {
        $activity = Activity::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
        $months = Activity::select(DB::raw("Month(created_at) as month"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month)
        {
            $datas[$month] = $activity[$index];
        }
        // bar-chart
        return view('mentor.submission',compact('datas'));
    }
}
