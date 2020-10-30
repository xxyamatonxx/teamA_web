<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Reward;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.project', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーション
        $rules = [
            'title' => ['required', 'between:1,40'],
            'overview' => ['required'],
            'target_money' => ['required', 'integer', 'min:1'],
            'image' => ['required','file', 'image', 'mimes:png,jpeg'],
        ];
        $this->validate($request, $rules);

        //画像の処理
        $image = $request->file('image');
        if ($request->hasFile('image') && $image->isValid()) {
            $image = $image->getClientOriginalName();
        }
        //プロジェクト申請
        Project::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'overview' => $request->overview,
            'image' => $request->file('image')->storeAs('public/images', $image),
            'target_money' => $request->target_money,
            'start' => $request->start,
            'end' => $request->end,
        ]);
        $project = Project::orderBy('id','desc')->get()->first();
        return redirect(route('reward.create',$project->id));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('welcome');
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
    }
}
