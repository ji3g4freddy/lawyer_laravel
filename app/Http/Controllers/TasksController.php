<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Task;
use App\Http\Requests\TaskRequest;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //join the users table and get all the posts
        $tasks = Task::join('users','tasks.user_id','=','users.id')
                    ->select('tasks.*')
                    ->get();

        // load the view and pass the tasks
        return view('tasks.index')
            ->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        //
        $request->user()->tasks()->create([
                'date' => $request->date,
                'category' => $request->category,
                'hour' => $request->hour,
                'description' => $request->description,
            ]);

        return redirect()->route('tasks.index');
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
        // get the task
        $task = Task::find($id);

        // show the view and pass the task to it
        return view('tasks.show')
            ->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // get the task
        $task = Task::find($id);

        // show the edit form and pass the task
        return view('tasks.edit')
            ->with('task', $task);
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
        //
        // get the task
        $task = Task::find($id);

        // update the edit form
        $task ->update($request->all());
        // redirect to the show page
        return redirect()->route('tasks.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // delete
        $task = Task::find($id);
        $task->delete();

        // redirect
        // \Session::flash('message', 'Successfully deleted the task!');
        session()->flash('message', 'Successfully deleted the task!');

        return redirect()->route('tasks.index');

    }

}
