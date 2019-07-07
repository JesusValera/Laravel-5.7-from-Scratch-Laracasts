<?php

namespace App\Events;

use App\Project;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ProjectCreated
{
    use Dispatchable, SerializesModels;

    /** @var Project */
    public $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

}
