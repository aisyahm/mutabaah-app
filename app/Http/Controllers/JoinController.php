<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JoinController extends Controller
{
    // PERMINTAAN BERGABUNG DALAM GRUP
    public function join(Request $request) {
      // CARI ROW DALAM TABEL GRUP YANG INVITATION_CODE == INVITATION->CODE
      $find = Group::all()->where("invitation_code", $request->code);
      $group = count($find) ? $find->first()->id : false;
      $user = Auth::user()->id;

      // PESAN JIKA INVITATION->CODE YANG DIMASUKKAN TIDAK VALID / TIDAK DITEMUKAN
      if (!$group) {
        $request->session()->flash("group", $group);
        $request->flash("code", $request->code);
        $request->flash("invalid");

        return back();
      }
      
      // CEK APAKAH USER SUDAH TERDAFTAR DENGAN GROUP TERSEBUT PADA TABEL USER_GRUP (PENDING ATAUPUN SUDAH BERGABUNG)
      $pendingGroup = UserGroup::where("group_id", $group)->where("user_id", $user)->get();
      if (count($pendingGroup)) {
        // JIKA STATUS PENDING, KIRIM PESAN PENDING  ||  MENUNGGU KONFIRMASI BERGABUNG GRUP
        if ($pendingGroup->where("is_accept", false)->first()) {
          $request->session()->flash("pending");
        } 
        // JIKA STATUS ACCEPT, KIRIM PESAN SUDAH BERGABUNG DALAM GRUP
        else {
          $request->session()->flash("join");
        }

        $request->flash("code", $request->code);
        return back();
      }

      // TAMBAHKAN ROW USER DAN GRUP TERSEBUT PADA TABEL USER_GRUP  ||  STATUS DEFAUL == PENDING
      UserGroup::create([
        "user_id" => $user,
        "group_id" => $group,
      ]);      

      return redirect(route("home"));
    }
}
