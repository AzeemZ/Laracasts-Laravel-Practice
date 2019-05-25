<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;

class ProjectTasksController extends Controller
{
    public function store(Project $project)
    {
        $project->addTask(
            request()->validate(['description' => 'required'])
        );

        return back();
    }

    public function update(Task $tasks)
    {
        $tasks->update([
            'completed' => request()->has('completed')
        ]);

        return back();
    }
}
