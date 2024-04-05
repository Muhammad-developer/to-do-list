<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Task::all();
        return view('home', compact('data'));
    }

    public function create()
    {
        return view('add-task');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['required']
        ]);

        Task::create([
            'name' => $data['name'],
            'description' => $data['description'],
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

        return view('edit-task', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $task = Task::find($request->id);
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['required']
        ]);

        $task->update([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        return redirect()->route('index')->with('message', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $id)
    {
        Task::where('id', $id->id)->delete();
        /*$task = Task::find($id);
        $task->delete();*/
        return redirect()->route('index')->with('message', 'Success');
    }
}
