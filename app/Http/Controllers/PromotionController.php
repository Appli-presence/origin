<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller {

    public function delete($id)
    {
        $delete = Promotion::where('id', $id)
            ->get();
        foreach ($delete as $d) {
            $d->delete();
        }
    }
}
