<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $guarded = [];

    // $task->project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
