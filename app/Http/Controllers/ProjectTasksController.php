<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    /** @var Request */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function store(Project $project)
    {
        $attributes = $this->validate($this->request, ['description' => 'required']);
        $project->addTask($attributes);

        return back();
    }

}
