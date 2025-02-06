<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Task/Index',['tasks'=>Task::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Task/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Task::create([...$request->all(),...$request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'due_date'=>'required|date',
           'status'=>'required|boolean'
        ])]);

        return redirect()->route('tasks.index')->with('success','Úloha bola úspešne vytvorená.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Inertia('Task/Show',['task'=>Task::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Inertia('Task/Edit',['task'=>Task::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'due_date'=>'required|date',
            'status'=>'required|boolean'
        ]);

        $task->update($validatedData);

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::destroy($id);

        return redirect()->route('tasks.index');
    }
}
