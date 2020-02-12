<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Promotion;
use App\cours;

class coursController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addCours(Request $request){
        $cours = new cours();

        $cours->libelle = $request->libelle;
        $cours->debut = $request->date.' '.$request->h_debut.':00';
        $cours->fin = $request->date.' '.$request->h_fin.':00';
        $cours->userId = $request->userId;
        $cours->promoId = $request->promoId;

        $cours->save();
        return redirect()->route('getCours');
    }

    public function addCoursForm(){
        $user = User::where('role','NOT LIKE','ADMIN')->get();
        $promotion = Promotion::all();

        return view('lesson.addCours', ['user' => $user, 'promotion' => $promotion]);
    }

    public function getCours(){
        $cours = DB::select(DB::raw('SELECT cours.*,name,promotions.libelle AS promo FROM cours, users, promotions WHERE cours.userId = users.id AND cours.promoId = promoId;'));
        return view('lesson.listCours', ['list' => $cours]);
    }

    public function updateCours(Request $request){
        $cours = cours::find($request->id);

        $cours->libelle = $request->libelle;
        $cours->debut = $request->date.' '.$request->h_debut.':00';
        $cours->fin = $request->date.' '.$request->h_fin.':00';
        $cours->userId = $request->userId;
        $cours->promoId = $request->promoId;

        $cours->save();
        return redirect()->route('getCours');
    }

    public function updateCoursForm($id){
        $user = User::where('role','NOT LIKE','ADMIN')->get();
        $promotion = Promotion::all();
        $cours = cours::find($id);
        return view('lesson.updateCours',['list' => $cours,'user' => $user, 'promotion' => $promotion]);
    }

    public function deleteCours($id){
        $cours = cours::find($id);
        $cours->delete();
        return redirect()->route('getCours');

    }


}


