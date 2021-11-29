<?php

namespace App\Models;

use App\Models\User;
use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserGroup extends Model
{
    use HasFactory;

    protected $guarded = [
      "id"
    ];

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function group() {
      return $this->belongsTo(Group::class);
    }

}
