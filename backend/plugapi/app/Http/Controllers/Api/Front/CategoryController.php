<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zhaner;
use App\Models\WhiteList;
use Illuminate\Support\Facades\Cache;


class CategoryController extends Controller
{
    public function getCats(){
        $data = Zhaner::all();

        if(count($data) != 0){
            return response()->json($data);
        }else{
            return response()->json(null);
        }
    }
}
