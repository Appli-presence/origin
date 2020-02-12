<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Etudiant;
use App\Promotion;
use App\AppartientPromotion;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    /*Selectionner tous les etudiants*/
    public function getAllStudents(){
        $students = DB::table('etudiants')->leftjoin('appartientpromotions', 'appartientpromotions.etudiantId', '=', 'etudiants.etudiantId')->leftjoin('promotions', 'promotions.promotionId', '=', 'appartientpromotions.promotionId')->get();
        $promotions = new Promotion();
        $promotions = Promotion::all();
        $return = ["student" =>  $students, "promo"=> $promotions];
        return view('student/studentList', ['param' => $return]);
    }
    /*Selectionner etudiant selon la promotion*/
    public function getGroupStudents($id){
        $students = new Etudiant();
        $students = Etudiant::find($id);
        return view('studentList', ['param' => $students]);
    }
    /*Ajouter un etudiant */
    public function addStudent(Request $request){
        $student = new Etudiant();
        $student->nom = $request->post('nom');
        $student->prenom = $request->post('prenom');
        $student->save();

        return redirect(route('studentList'));
    }
    /*Mettre à jour les informations de l'etudiant */
    public function updateStudent(Request $request){
        $student = new Etudiant();
        $student = Etudiant::where('etudiantId', $request->post('etudiantId'))->first();
        $student->nom = $request->post('nom');
        $student->prenom = $request->post('prenom');
        $student->save();

        return redirect(route('studentList'));
    }
    /*Supprimer un etudiant */
    public function deleteStudent($studentId){
        $student = new Etudiant();
        $student = Etudiant::where('etudiantId', $studentId);
        $student->delete();
        return redirect(route('studentList'));
    }

    public function linkPromo(Request $req){
        $link = new AppartientPromotion();
        $link->etudiantId = $req->post('studentId');
        $link->promotionId = $req->post('promoId');
        $link->save();

        return redirect(route('studentList'));
    }
}