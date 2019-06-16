<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';
    public function achievements()
    {
        return $this->hasMany('App\Models\JobAchievement');
    }
}
