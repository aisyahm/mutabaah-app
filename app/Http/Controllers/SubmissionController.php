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
        $group = Group::find(1);
        //dd($group); 
        /*$lists = [];
        foreach ($activities as $activity){
            $lists[] = [$activity->name, $activity->id];
        }
        dd($lists[0][1]); */
        return view("mentor.submission.index", [
            "activities" => $activities,
            "group" => $group
        ]);

    }
    public function add(Request $request){
        //$activities = Group::with("group")->where("group_id", 1)->get();
        $group_activity = $request->input('group_activity');
        $group_id = $request->input('group_id');

        //dd($group_id);
        foreach ($group_activity as $list_activity){
            ActivityGroup::create([
                "group_id" => $group_id,
                "activity_id" => $list_activity
            ]);
        }
                
        return view("mentor.submission.add");

    }
}
