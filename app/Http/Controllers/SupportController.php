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
        $projects = Support::where('project_id', $project_id)->get();
        foreach ($projects as $project) {
            $price = $project->reward->price;
            $prices[] = $price;
        }
        $sum_price = array_sum($prices);

        foreach ($projects as $project) {
            $user = $project->user->id;
            $users[] = $user;
        }
        $users_unique = array_unique($users);
        $supportors = count($users_unique);

        $project = Project::find($project_id);
        $project->now_support_money = $sum_price;
        $project->now_supportors = $supportors;
        $project->save();
        
        return view('thank_you');
    }
}
