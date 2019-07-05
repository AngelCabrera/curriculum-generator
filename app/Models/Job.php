<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasDefaultImageTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasDefaultImageTrait;
    use SoftDeletes;
    
    protected $table = 'jobs';

    public function achievements()
    {
        return $this->hasMany('App\Models\JobAchievement');
    }
}
