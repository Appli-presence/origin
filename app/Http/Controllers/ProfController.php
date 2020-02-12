<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }

    public function addProf(Request $request){

    	$user = new User();
    	$user->name = $request->name;
    	$user->role = $request->role;
    	$user->email = $request->email;
    	$user->password = Hash::make($request->pwd);

    	$user->save();

        return redirect()->route('getProfs');
    }

    

    public function getProfs(){
        $user = User::where('role','NOT LIKE','ADMIN')->get();
        return view('teacher.listTeachers', ['users' => $user]);
    }

    public function updateProf(Request $request){

    	$user = User::find($request->id);
    	$user->name = $request->name;
    	$user->role = $request->role;
    	$user->email = $request->email;
    	$user->password = Hash::make($request->pwd);

    	$user->save();
        
        return redirect()->route('getProfs');
    }

    public function updateProfForm($id){
        $user = User::find($id);
        return view('teacher.updateProf',['user' => $user]);
    }

    public function deleteProf($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('getProfs');

    }
}
