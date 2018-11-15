<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description'];

    // $project->tasks
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        $this->tasks()->create($task);

        // It is not needed because we have defined the relation in tasks()
        // so it takes the project_id automatically.
//        return Task::create([
//            'project_id' => $this->id,
//            'description' => $description,
//        ]);
    }
}
