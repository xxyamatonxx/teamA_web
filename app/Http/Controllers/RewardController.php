<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Reward;
use Illuminate\Support\Facades\Auth;

class RewardController extends Controller
{
    public function create($id)
    {
        $project = Project::find($id);
        $user = $project->user->id;

//プロジェクトを保持してるユーザーのみリターンの申請が可能
        if (Auth::id() === $user) {
            return view('reward.create', compact('project'));
        }else{
            abort(403,'権限がありません');
        }
    }

    public function store(Request $request, $id)
    {
        //バリデーション
        $rules = [
            'title' => ['required', 'between:1,40'],
            'overview' => ['required'],
            'price' => ['required', 'integer', 'min:1','max:1000000'],
        ];
        $this->validate($request, $rules);

        Reward::create([
            'project_id' => $id,
            'title' => $request->title,
            'overview' => $request->overview,
            'price' => $request->price,
        ]);
        return view('success');
    }

    public function show($id){
        $reward = Reward::find($id);
        return view('reward.show',compact('reward'));
    }
}
