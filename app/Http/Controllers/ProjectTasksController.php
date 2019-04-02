<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function update(Task $tasks)
    {
        $tasks->update([
            'completed' => request()->has('completed')
        ]);

        return back();
    }
}
