<?php

namespace App\Models;

use App\Models\Submission;
use App\Models\GroupActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = [
      "id"
    ];

    public function groupActivity() {
      return $this->hasMany(GroupActivity::class);
    }
}
