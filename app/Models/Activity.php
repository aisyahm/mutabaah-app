<?php

namespace App\Models;

use App\Models\Submission;
use App\Models\ActivityGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = [
      "id"
    ];

    public function activityGroup() {
      return $this->hasMany(ActivityGroup::class);
    }

    public function submission() {
      return $this->hasMany(Submission::class);
    }
}
