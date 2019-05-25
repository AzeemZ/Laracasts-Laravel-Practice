<?php

namespace App\Http\Controllers;

use App\Mail\ProjectCreated;
use App\Project;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$projects = auth()->user()->projects;
//        $projects = Project::where('user_id', auth()->id())->get();

        return view('projects.index', [
            'projects' => auth()->user()->projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validated = $this->validateProject();

        $validated['user_id'] = auth()->id();

        $project = Project::create($validated);

        event(new ProjectCreated($project));

//        Mail::to($project->user->email)->send(
//            new ProjectCreated($project)
//        );

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return Response
     * @throws AuthorizationException
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);
        //abort_if($project->id !== auth()->id(), 403);

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Project $project
     * @return Response
     */
    public function update(Project $project)
    {
        $project->update($this->validateProject());

        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return Response
     * @throws Exception
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }

    public function validateProject()
    {
        return request()->validate([
            'title' => ['required', 'min: 3'],
            'description' => ['required', 'min:5']
        ]);
    }
}
