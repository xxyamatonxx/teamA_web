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
        Reward::create([
            'project_id' => $id,
            'title' => $request->title,
            'overview' => $request->overview,
            'price' => $request->price,
        ]);
        return view('success');
    }
}
