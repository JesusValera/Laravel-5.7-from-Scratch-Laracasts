<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', [
            'projects' => $projects,
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project,
        ]);
    }

    public function store()
    {
        Project::create(['title', 'description']);

        return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $project->update(request(['title', 'description']));

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }


}
