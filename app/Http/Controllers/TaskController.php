<?php

namespace App\Http\Controllers;

use App\Models\HistoryStatus;
use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Task::paginate(5);
        $statuses = TaskStatus::all();
        return view('home', compact('data', 'statuses'));
    }

    public function create()
    {
        $statuses = TaskStatus::all();
        return view('add-task', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'task_status_id' => ['required'],
        ]);

        $task = Task::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'task_status_id' => $data['task_status_id'],
        ]);

        HistoryStatus::create([
            'task_status_id' => $data['task_status_id'],
            'task_id' => $task->id
        ]);
        return redirect()->route('index')->with('message', 'Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $id)
    {
        $task = Task::find($id->id);

        $data = empty($task) ? ['message' => '404 Not Found'] : $task;
        $statuses = TaskStatus::all();


        return view('edit-task', compact('data', 'statuses'));
    }

    public function showHistory(string $id)
    {
        $task = Task::find($id);
        $history = HistoryStatus::where('task_id', $id)->orderBy('id', 'desc')->get();
//        dd($history[0]->historyStatus);

        return view('history', compact('task', 'history'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $task = Task::find($request->id);
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'task_status_id' => ['required']
        ]);

        $task->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'task_status_id' => $data['task_status_id']
        ]);

        HistoryStatus::create([
            'task_status_id' => $request['task_status_id'],
            'task_id' => $task->id
        ]);
        return redirect()->route('index')->with('message', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $id)
    {
        Task::where('id', $id->id)->delete();

        return redirect()->route('index')->with('message', 'Success');
    }
}
