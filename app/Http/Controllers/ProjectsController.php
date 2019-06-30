<?php

namespace App\Http\Controllers;

use App\Mail\ProjectCreated;
use App\Project;
use App\Services\Twitter;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard as Auth;

class ProjectsController extends Controller
{
    /** @var Request */
    private $request;

    /** @var Auth */
    private $auth;

    public function __construct(Request $request, Auth $auth)
    {
        $this->request = $request;
        $this->auth = $auth;

        $this->middleware('auth');
//        ->only(['store', 'update'])
//        ->except(['store', 'update'])
    }

    public function index(Twitter $twitter)
    {
        return view('projects.index', [
            'projects' => $this->auth->user()->projects,
            'twitter' => $twitter,
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
//        abort_if($project->id !== auth()->id(), 403);
//        abort_unless(auth()->user()->owns($project), 403);
//        if (\Gate::denies('update', $project)) {
//            abort(403);
//        }
//        abort_unless(\Gate::allows('update', $project), 403);
        $this->authorize('update', $project);

        return view('projects.show', [
            'project' => $project,
        ]);
    }

    public function store()
    {
        $validated = $this->validateProject();
        $validated['owner_id'] = $this->auth->id();

        /** @var Project $project */
        $project = Project::create($validated);

        \Mail::to($project->user->email)->send(
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
        $project->update($this->validateProject());

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }

    private function validateProject()
    {
        return $validated = $this->validate($this->request, [
            'title' => 'required|min:3',
            'description' => 'required|min:3',
        ]);
    }
}
