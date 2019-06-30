<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    /**
     * {@inheritDoc}
     */
    protected $guarded = [];

    /**
     * A task is inside of a project ($project->tasks).
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function complete(bool $completed = true): void
    {
        $this->update(compact('completed'));
    }

    public function incomplete(): void
    {
        $this->complete(false);
    }
}
