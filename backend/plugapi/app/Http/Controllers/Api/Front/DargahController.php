<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Payment;

class DargahController extends Controller
{
    public function request(Request $request){

        $payment = new Payment();

        $params = [];
        $resNum ="1234567890";
        $redirectUrl ="https://api.shadfilm.ir/api/dargah/verify_connect";
        $amount ="3000";

        
        $params['resNum'] = $resNum;
        $params['amount'] = $amount; 
        $params['redirectUrl'] = $redirectUrl;

        

        $getPurchaseParamsToSign = $payment->getPurchaseParamsToSign($params);

        return response()->json($getPurchaseParamsToSign);

   }


   public function verify(Request $request){
        dd("hsn");
   }
}
