<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\User;
//use Illuminate\Notifications\Messages\SlackMessage;
use App\Notifications\SlackNotification;

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
        $projects = Auth::user($id)->projects->all();
        //dd($projects);
        return view('home',['user_data' => $user_data,'projects' => $projects]);
    }

    public function show(Request $request){
        $user_id = $request->user_id;
        return view('mypage_edit',['user_id' => $user_id]);
    }

    public function edit(Request $request){

         $validated_data = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        $user_id = $request->user_id;
        $user_data = Auth::user($user_id);
        $user = Auth::user();
        $user->name = $request->get('new-name');
        $user->email = $request->get('new-email');
        $user->password = bcrypt($request->get('new-password'));
        // $password = $user->password;
        // dd($password);
        $user->save();
        $projects = Auth::user($user_id)->projects->all();
        return view('home',['user_data' => $user_data, 'user_id' => $user_id,'projects' => $projects]);
    
       // return redirect()->back()->with('update_password_success', 'パスワードを変更しました。');
    }

    public function toSlack(){
        $slack = new SlackNotification;
        $me =$slack->toSlack();
        dd($me);
    }
    
}
