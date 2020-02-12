<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;
use Session;

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
        return view('home', ['role', $role]);
    }
}
