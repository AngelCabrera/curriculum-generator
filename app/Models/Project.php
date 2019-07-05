<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    public function technologies()
    {
        return $this->hasMany('App\Models\ProjectTechnology');
    }
}
