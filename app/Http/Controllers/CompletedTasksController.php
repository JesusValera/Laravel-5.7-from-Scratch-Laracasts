<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CompletedTasksController extends Controller
{
    public function store(Task $task): RedirectResponse
    {
        $task->complete();

        return back();
    }

    public function destroy(Task $task)
    {
        $task->incomplete();

        return back();
    }
}
