<?php

namespace App\Models;

use App\Models\GroupActivity;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submission extends Model
{
    use HasFactory;

    protected $guarded = [
      "id"
    ];

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function groupActivity() {
      return $this->belongsTo(GroupActivity::class);
    }
}
