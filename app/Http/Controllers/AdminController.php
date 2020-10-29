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
}
