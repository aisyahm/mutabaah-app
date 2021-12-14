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
    public function index(){
        $activities = Activity::all();
        $wajib = $activities->where("category", 1);
        $rawatib = $activities->where("category", 2);
        $sunnah = $activities->where("category", 3);
        $others = $activities->where("category", 4);
        $dzikir = $activities->where("category", 5);
        $group = Group::find(1);
        //dd($wajib); 
        /*$lists = [];
        foreach ($activities as $activity){
            $lists[] = [$activity->name, $activity->id];
        }
        dd($lists[0][1]); */
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
    public function addActivities(Request $request){
        //$activities = Group::with("group")->where("group_id", 1)->get();
        $group_activity = $request->input('group_activity');
        $group_id = $request->input('group_id');

        //dd($group_activity);
        foreach ($group_activity as $list_activity){
            ActivityGroup::create([
                "group_id" => $group_id,
                "activity_id" => $list_activity
            ]);
        }
                
        return redirect(route("group_activities"));

    }

    public function viewActivities(){
        $user = User::find(1);
        $group = Group::find(1);
        //$group_activities = ActivityGroup::all();
        //$this_group_activities = $group_activities->where("group_id", $group->id);

        $group_activities_id = ActivityGroup::where("group_id", $group->id)->get();
        //dd($group_activities_id);
        $group_activities_name = [];
        foreach ($group_activities_id as $id_activities){
            $group_activities_name[] = $id_activities->activity->name;
            //$group_activities_name = Activity::where("id", $id_activities->activity_id)->get();
        }
        
        
        //dd($activity_id);
        dd($group_activities_name);

        //$name_activities = Activity::all();
        //$name_group_activities = $name_activities->where("id", $this_group_activities->activity_id);
        //dd($name_group_activities);


        return view("mentor.submission.group_activities", [
            "group_activities_id" => $group_activities_id,
            "group_activities_name" => $group_activities_name,
            "group" => $group,
            "user" => $user
        ]);

    }
}
