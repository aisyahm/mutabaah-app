<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityGroup extends Model
{
    use HasFactory;

    protected $guarded = [
      "id"
    ];

    public function group() {
      return $this->belongsTo(Group::class);
    }

    public function activity() {
      return $this->belongsTo(Activity::class);
    }
}
