<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\UserGroup;
use Illuminate\Http\Request;
// exports excel
use App\Exports\SubmissionExport;
use App\Exports\SubmissionMultiSheetExport;
// import
// use App\Imports\SubmissionImport;
use Maatwebsite\Excel\Excel;
use App\Http\Controllers\Controller;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $submission = UserGroup::all();
        // dd($submission);
        return view('mentor.submission',compact('submission'));
    }

    private $excel;
    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }
    // ubah tahun terima data disini 2021
    public function submissionexport(){
        return $this->excel->download(new SubmissionMultiSheetExport(2021), 'submission.xlsx');
    }

    // // import
    // public function activityimportexcel(Request $request){
    //     $file = $request->file('file');
    //     $namaFile = $file->getClientOriginalName();
    //     // di public adanya
    //     $file->move('DataActivity', $namaFile);

    //     // dari file Imports\ActivityImport
    //     Excel::import(new ActivityImport, public_path('/DataActivity/'.$namaFile));
    //     return redirect('activity.activity');
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
