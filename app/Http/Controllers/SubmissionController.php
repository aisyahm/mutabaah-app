<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\GroupActivity;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SubmissionController extends Controller{
    public function add(User $user){
        if (!Auth::user()->is_mentor) return back();

    }
}

?>