<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Etudiant;
use App\Assistance;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function readIndex()
    {
        $id = Auth::id();
        $cours = DB::select(
            DB::raw('SELECT cours.*,
            promotions.libelle AS promo
            FROM cours, promotions
            WHERE cours.userId = '.$id.' AND cours.promoId = promotions.promotionId;'));
        //$promotion=promotion::all();
        return view('/teacherRole/index',[
            "cours"=>$cours]);
    }
    public function faireAppel(Request $req)
    {
        $students = DB::select(
            DB::raw('SELECT etudiants.*,appartientpromotions.promotionId
            FROM etudiants,appartientpromotions
            WHERE etudiants.etudiantId = appartientpromotions.etudiantId and appartientpromotions.promotionId='.$req->promo.' ;'));
        foreach($students as $stud){
            $assistant=new assistance();
            $assistant->etudiantId=$stud->etudiantId;
            $assistant->coursId=$req->input('cours');
            if($req->input($stud->etudiantId)==1){
                $assistant->presence=$req->input($stud->etudiantId);
            }else{
                $assistant->presence=0;
            }

            $assistant->date=Carbon::now()->toDateString();
            $assistant->validationAbsence=1;
            $assistant->save();
        }
        return redirect()->route('readStudents');
    }

    public function readStudents(){
        $id = Auth::id();
        $cours = DB::select(
            DB::raw('SELECT cours.*,promotions.promotionId as promoId,
            promotions.libelle AS promo
            FROM cours, promotions
            WHERE cours.userId = '.$id.' AND cours.promoId = promotions.promotionId;'));
        $students = DB::select(
                DB::raw('SELECT etudiants.*,appartientpromotions.promotionId
                FROM etudiants,appartientpromotions
                WHERE etudiants.etudiantId = appartientpromotions.etudiantId;'));
        return view('teacherRole/index', ['param' => $students, "cours"=>$cours]);
    }
}
