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
        $user = \Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        // $password = $user->password;
        // dd($password);
        $user->save();
        return view('home',['user_data' => $user_data, 'user_id' => $user_id])->with('update_password_success', 'パスワードを変更しました。');
    
       // return redirect()->back()->with('update_password_success', 'パスワードを変更しました。');
    }
    
}
