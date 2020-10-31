<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
{
    public function store($id)
    {
        Support::create([
            'user_id' => Auth::id(),
            'reward_id' => $id
        ]);
        return view('thank_you');
    }
}
