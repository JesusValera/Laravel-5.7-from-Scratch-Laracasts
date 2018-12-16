<?php

namespace App\Http\Controllers;

use App\Mail\ProjectCreated;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
//        ->only(['store', 'update'])
//        ->except(['store', 'update'])
    }

    public function index()
    {
        $projects = Project::where('owner_id', auth()->id())->get();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
        //abort_if($project->id !== auth()->id(), 403);
        //abort_unless(auth()->user()->owns($project), 403);
        $this->authorize('update', $project);
//        if (\Gate::denies('update', $project)) {
//            abort(403);
//        }
//        abort_unless(\Gate::allows('update', $project), 403);


        return view('projects.show', [
            'project' => $project,
        ]);
    }

    public function store()
    {
        $validated = request()->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
        ]);
        $validated['owner_id'] = auth()->id();

        $project = Project::create($validated);

        \Mail::to('TO-jesus.valera@smileandlearn.com')->send(
            new ProjectCreated($project)
        );

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
