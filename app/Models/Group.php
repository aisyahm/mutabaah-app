<?php

namespace App\Models;

use App\Models\UserGroup;
use App\Models\ActivityGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [
      "id"
    ];

    public function userGroup() {
      return $this->hasMany(UserGroup::class);
    }

    public function activityGroup() {
      return $this->hasMany(ActivityGroup::class);
    }
}
