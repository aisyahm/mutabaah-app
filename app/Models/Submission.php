<?php

namespace App\Models;

use App\Models\GroupActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submission extends Model
{
    use HasFactory;

    protected $guarded = [
      "id"
    ];

    public function groupActivity() {
      return $this->belongsTo(GroupActivity::class);
    }
}
