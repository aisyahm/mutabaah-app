<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        // $submission = Submission::all();
        // dd($submission);
        return view('mentor.laporan');
    }
}
