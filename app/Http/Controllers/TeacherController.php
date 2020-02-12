<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Etudiant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return view('/teacher/index',[
            "cours"=>$cours]);
    }

    public function readStudents(){
        $id = Auth::id();
        $cours = DB::select(
            DB::raw('SELECT cours.*,promotions.promotionId as promoId,
            promotions.libelle AS promo
            FROM cours, promotions
            WHERE cours.userId = '.$id.' AND cours.promoId = promotions.promotionId;'));
        $students = DB::select(
                DB::raw('SELECT etudiants.*,appartientpromotions.promotionId as promoId
                FROM etudiants,appartientpromotions
                WHERE etudiants.etudiantId = appartientpromotions.etudiantId;'));
        return view('teacher/index', ['param' => $students, "cours"=>$cours]);
    }
}
