<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // View Tasks
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    // Show Create Form
    public function create()
    {
        return view('tasks.create');
    }

    // Add Task
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|max:255',
            'status' => 'required|in:Pending,Completed',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    // Edit Task Form
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update Task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name' => 'required|max:255',
            'status' => 'required|in:Pending,Completed',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    // Update Status Only (Quick toggle)
    public function updateStatus(Task $task)
    {
        $task->status = $task->status === 'Pending' ? 'Completed' : 'Pending';
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Status updated!');
    }

    // Delete Task
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}