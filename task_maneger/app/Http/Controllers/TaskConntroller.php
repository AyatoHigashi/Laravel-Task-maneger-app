<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskConntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // orderBy priority in database
        $tasks = Task::orderBy('priority')->get();
        return view('index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prioritys = [
            [
                'label' => 'High',
                'value' => 'High'
            ],
            [
                'label' => 'Medium',
                'value' => 'Medium'
            ],
            [
                'label' => 'Low',
                'value' => 'Low'
            ],
            [
                'label' => 'NULL',
                'value' => 'NULL'
            ]
        ];
        $statuses = [
            [
                'label' => 'Todo',
                'value' => 'Todo'
            ],
            [
                'label' => 'Done',
                'value' => 'Done'
            ]
        ];
       return view('create', compact('statuses', 'prioritys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->status = $request->priority;
        $task->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $prioritys = [
            [
                'label' => 'High',
                'value' => 'High'
            ],
            [
                'label' => 'Medium',
                'value' => 'Medium'
            ],
            [
                'label' => 'Low',
                'value' => 'Low'
            ],
            [
                'label' => 'NULL',
                'value' => 'NULL'
            ]
        ];
        $statuses = [
            [
                'label' => 'Todo',
                'value' => 'Todo'
            ],
            [
                'label' => 'Done',
                'value' => 'Done'
            ]
        ];
       return view('edit', compact('statuses', 'prioritys', 'task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $request->validate([
            'title' => 'required'
        ]);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->priority = $request->priority;
        $task->save();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('index');
    }
}
