<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use App\ProjectUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $projects = Project::where('user_id', Auth::user()->id)->first();
            return view('projects.index',compact('projects'));
        }
       return view('auth.login');
    }

    public function adduser(Request $request){
        //add user to projects 

        //take a project, add a user to it
        $project = Project::find($request->input('project_id'));

        if(Auth::user()->id == $project->user_id){

        $user = User::where('email', $request->input('email'))->first(); //single record

        //check if user is already added to the project
        $projectUser = ProjectUser::where('user_id',$user->id)
                                   ->where('project_id',$project->id)
                                   ->first();
                                   
           if($projectUser){
               //if user already exists, exit 
       
               return redirect()->route('projects.show',['project'=> $project->id])
               ->with('success' ,  $request->input('email').' is already a member of this project'); 
              
           }


           if($user && $project){

               $project->users()->attach($user->id); 

               return redirect()->route('projects.show',compact('project'))
               ->with('success' ,  $request->input('email').' is already a member of this project'); 
                                     
                   }
                   
        }

        return redirect()->route('projects.show', ['project'=> $project->id])
        ->with('errors' ,  'Error adding user to project');
       

        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id = null)
    {
        $companies = null;
        if (!$company_id) {
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }
        return view('projects.create',['company_id' => $company_id], compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {if(Auth::check()){
        $project = Project::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'company_id' => $request->input('company_id'),
            'user_id' => Auth::user()->id
        ]);


        if($project){
            return redirect()->route('projects.show', compact('project'))//['project'=> $project->id]
            ->with('success' , 'Project created successfully');
        }

    }
    
        return back()->withInput()->with('errors', 'Error creating new project');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $project = Project::find($id);
        $projects = Project::all();
        $comments = $project->comments; 
        return view('projects.show', compact('project','projects', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
        ]);
        $projectUpdate = Project::find($id);
        $projectUpdate->name = $request->name;
        $projectUpdate->description = $request->description;
        $projectUpdate->save();
        //redirect
        return redirect()->route('projects.index')->with('successMsg','project Successfully Updated');

        //redirect
    //   return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findproject = Project::find($id);
        if ($findproject->delete())
        {
           return redirect()->route('projects.index')->with('success', 'project deleted successfully');
        }
    
        return redirect()->back()->with('error','project could not be deleted');
    
    }
}
