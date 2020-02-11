<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\promotion;
use App\categorie;
use Auth;
use Session;

class PromotionController extends Controller
{
    //create
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categorie=categorie::all();
        $produit=produit::paginate(6);
        return view('index',[
            "categories"=>$categorie,
            "produits"=>$produit
            ]);
    }
}
