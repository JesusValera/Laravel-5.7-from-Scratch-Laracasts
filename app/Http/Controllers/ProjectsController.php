<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
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
        $validated = request()->validate([
            'title' => 'required|min:3',
            'description' => 'required',
        ]);

        Project::create($validated);

        return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $validated = request()->validate([
            'title' => 'required|min:3',
            'description' => 'required',
        ]);

        $project->update($validated);

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }

}
