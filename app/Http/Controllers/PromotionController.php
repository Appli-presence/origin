<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\promotion;
use Auth;
use Session;

class PromotionController extends Controller
{
    //create
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(Request $request)
    {
        $promotion=new promotion();
        $promotion->libelle=$request->post('libelle');
        $promotion->save();
        return redirect(route('read'));
    }
    public function createForm(){
        return view('/promotion/create-promo');
    }
    public function read()
    {
        $promotion=promotion::all();
        return view('/promotion/read-promo',[
            "promotions"=>$promotion
            ]);
    }
    public function readIndex()
    {
        $promotion=promotion::all();
        return view('/promotion/index',[
            "promotions"=>$promotion]);
    }
    public function update(Request $Request,$data)
    {
        $promo = Promotion::where('promotionId',$data)->first();
        $promo->libelle = $Request->post('libelle');
        $promo->save();

        return redirect(route('read'));
    }
    public function updateForm(Promotion $id){
        return view('/promotion/update-promo', ['promotion' =>$id]);
    }
    public function delete($promotionId){
        $delete=Promotion::where('promotionId',$promotionId);
        $delete->delete();
        return redirect(route('read'));
    }
}
