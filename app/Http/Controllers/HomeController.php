<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $id = $request->id;
        $user_data = Auth::user($id);
        // dd($user_data);
        return view('home',['user_data' => $user_data]);
    }

    public function edit(Request $request){
        $id = $request->user_id;
        $user_data = Auth::user($id);


        return view('home',['user_data' => $user_data]);
    }
    
}
