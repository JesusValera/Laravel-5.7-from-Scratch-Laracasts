<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    /**
     * {@inheritDoc}
     */
    protected $fillable = ['title', 'description', 'owner_id'];

    /**
     * A task is inside of a project ($project->tasks)
     *
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    /**
     * @param $task
     *
     * @return Model
     */
    public function addTask($task): Model
    {
        $this->tasks()->create($task);
    }

}
