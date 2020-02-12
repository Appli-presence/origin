<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index()
    {
        $id=Auth::id(); 
        $user=user::where('id',$id)->first();
        $role=$user->role;
        if($role=="ADMIN"){
            return view('admin');
        }else{
            return view('profs');
        }
    }
}
