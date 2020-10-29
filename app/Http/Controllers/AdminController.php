<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class AdminController extends Controller
{
    //ボタンページ
    public function index()
    {
        return view('admin.index');
    }
    //公開中のプロジェクト一覧
    public function projects()
    {
        $projects = Project::where('release', true)->get();
        return view('admin.release_projects', compact('projects'));
    }
    //申請中のプロジェクト一覧
    public function request_projects()
    {
        $projects = Project::where('release', false)->get();
        return view('admin.projects_request', compact('projects'));
    }
    public function show()
    {
    }
    public function destroy()
    {
    }
    //申請中のプロジェクトの公開・非公開設定
    public function edit($id)
    {
        $project = Project::find($id);
        $user = $project->user;
        return view('admin.edit', compact('project', 'user'));
    }
    //申請中のプロジェクトの公開・非公開設定保存
    public function update(Request $request, $id)
    {
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
