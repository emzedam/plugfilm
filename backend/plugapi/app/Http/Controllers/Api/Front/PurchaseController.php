<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function get_purchases(){
        $list = Purchase::all();
        if(count($list) == 0){
            return response()->json(count($list));
        }
        return response()->json($list);
    }
}
