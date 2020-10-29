<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function request_projects(){
        $projects = Project::where('release',false)->get();
         return view('admin.projects_request',compact('projects'));
    }
    public function show(){

    }

        public function edit($id){
            $project = Project::find($id);
            $user = $project->user;
            return view('admin.edit',compact('project','user'));
    }

    public function update(Request $request,$id){
        $rules = [
        'release' => ['required'],
        ];
        $this->validate($request, $rules);
        $project = Project::find($id);
        $project->release = $request->release;
        $project->save();
        return redirect(route('admin.projects_request'));
    }
}
