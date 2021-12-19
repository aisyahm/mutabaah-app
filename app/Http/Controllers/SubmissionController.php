<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityGroup;
use App\Models\Group;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    //Fungsi menampilkan template aktivitas di user mentor
    public function index(){
        $activities = Activity::all();
        $wajib = $activities->where("category", 1);
        $rawatib = $activities->where("category", 2);
        $sunnah = $activities->where("category", 3);
        $others = $activities->where("category", 4);
        $dzikir = $activities->where("category", 5);
        $group = Group::find(1);

        return view("mentor.submission.index", [
            "activities" => $activities,
            "wajib" => $wajib,
            "rawatib" => $rawatib,
            "sunnah" => $sunnah,
            "others" => $others,
            "dzikir" => $dzikir,
            "group" => $group
        ]);
    }

    //Fungsi memilih dan menambahkan aktivitas kelompok
    public function addActivities(Request $request){
        $group_activity = $request->input('group_activity');
        $group_id = $request->input('group_id');

        foreach ($group_activity as $list_activity){
            ActivityGroup::create([
                "group_id" => $group_id,
                "activity_id" => $list_activity
            ]);
        }   
        return redirect(route("group_activities"));
    }
    //Fungsi untuk menampilkan aktivitas grup yang sudah dipilih
    public function viewActivities(){
        $user = User::find(1);
        $group = Group::find(1);

        $group_activities_id = ActivityGroup::where("group_id", $group->id)->get();
        $group_activities_name = [];
        foreach ($group_activities_id as $id_activities){
            $group_activities_name[] = $id_activities->activity->name;
        }
        return view("mentor.submission.group_activities", [
            "group_activities_id" => $group_activities_id,
            "group_activities_name" => $group_activities_name,
            "group" => $group,
            "user" => $user
        ]);
    }

    public function autoSubmit(){
        
    }
    //Fungsi submit submission oleh member
    public function submitSubmission(Request $request){
        $member_submission = $request->input('member_submission');
        $user_id = $request->input('user_id');

        dd($member_submission);
        return view('member.submission.submit');
    }
}
