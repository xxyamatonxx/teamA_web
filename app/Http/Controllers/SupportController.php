<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support;
use App\Reward;
use App\Project;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function store($id)
    {
        $reward = Reward::find($id);
        $project_id = $reward->project->id;
        Support::create([
            'user_id' => Auth::id(),
            'project_id' => $project_id,
            'reward_id' => $id,
        ]);
        // $reward = Reward::find($id);
        // $project_id = $reward->project->id;
        // $project = Project::find($project_id);
        // $project->now_support_money =
        // $project->save();
        return view('thank_you');
    }
}
