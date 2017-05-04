<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\User;
use App\Assign;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\AssignRequest;


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //join the users table and get all the projects
        $projects = Project::join('users','projects.user_id','=','users.id')
                    ->select('projects.*')
                    ->get();
        

        // load the view and pass the projects
        return view('projects.index')
            ->with('projects', $projects);      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        //
        $request->user()->projects()->create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

        return redirect()->route('projects.index');
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
        // get the project
        $project = Project::find($id);

        // show the view and pass the project to it
        return view('projects.show')
            ->with('project', $project);
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
        // get the project
        $project = Project::find($id);

        // show the edit form and pass the project
        return view('projects.edit')
            ->with('project', $project);
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
        // get the project
        $project = Project::find($id);

        // update the edit form
        $project ->update($request->all());
        // redirect to the show page
        return redirect()->route('projects.show',$id);
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
        $project = Project::find($id);
        $project->delete();

        // redirect
        // \Session::flash('message', 'Successfully deleted the project!');
        session()->flash('message', 'Successfully deleted the project!');

        return redirect()->route('projects.index');
    }

    //assign to user
    public function assign($id)
    {
        //
        // get the project
        $users = User::all();
        $project = Project::find($id);
        // $assign = Assign::join('users','assign.user_id','=','users.id')
        //             ->where('assign.project_id','=',$id)
        //             ->get();

        $assign = User::join('assign','assign.user_id','=','users.id')
                    ->where('assign.project_id','=',$id)
                    ->get();

        // $notassign = User::leftjoin('assign','assign.user_id','=','users.id')
        //             ->where('assign.project_id','<>',$id)
        //             ->orWhereNull('assign.project_id')
        //             ->get();



        // show the edit form and pass the project
        return view('projects.assign')
            ->with('project', $project)
            ->with('users',$users)
            ->with('assign',$assign);
            //->with('notassign',$notassign);
    }

    public function match(AssignRequest $request, $id)
    {
        //
        $project = $request->user_id;
        // dd($project);
        echo $count=count($project);
         for($i=0; $i<count($project); $i++){

            $data=[
                'project_id' => $id,
                'user_id'=> $project[$i],
            ];

            Assign::create($data);

        }


        // $project->user()->createMany(Input::get('user_id'));

        // $request->user()->projects()->createMany([
        //         'name' => $request->name,
        //         'description' => $request->description,
        //     ]);

        return redirect()->route('projects.index');
    }
}
