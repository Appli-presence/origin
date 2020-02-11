<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Promotion;
use Illuminate\Http\Request;

<<<<<<< HEAD
class PromotionController extends Controller {

    public function delete($id)
    {
        $delete = Promotion::where('id', $id)
            ->get();
        foreach ($delete as $d) {
            $d->delete();
        }
    }
=======
class PromotionController extends Controller
{

    //Edit
    //create
>>>>>>> 7f2d96a08bbd5ed0605dfce3bd4ed53b751d4001
}
