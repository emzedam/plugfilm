<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentsController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api' , ['except' => 'pay_verify']);
    }

    public function save_order(Request $request){
        $user = Auth::user();
            if($user instanceof User){
                try{
                    foreach($user->purchases as $purchase){
                        if($purchase->id == $request->id){
                            return response()->json(['existPurchase'=> true]);
                        }
                    }

                    return $this->connectTo($request , $user);
                }catch(Exception $e){
                    return response()->json(['status' => 'failed']);
                }
            }
    }



    public function connectTo(Request $request){
        $user = Auth::user();
        $data = array("merchant_id" => "06f913c3-12fe-4254-900b-f6b8e533506e",
          "amount" => $request->amount ,//$request->amount
          "callback_url" => "https://api.plugfilm.ir/api/payments/pay_verify",
          "description" => "خرید اشتراک پلاگ فیلم",
          "metadata" => ["email" => "info@email.com","mobile"=>"09121234567"],
        );
        $jsonData = json_encode($data);
        $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/request.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
  
        $result = curl_exec($ch);
        $err = curl_error($ch);
        $result = json_decode($result, true, JSON_PRETTY_PRINT);
        curl_close($ch);
  
        if ($err) {
            $response = new Response([
              'error' => "cURL Error #:" . $err,
            ]);
            return $response;
        } else {
            if (empty($result['errors'])) {
                if ($result['data']['code'] == 100) {
                   $createPay = Payment::create([
                      'user_id' => $user->id,
                      'amount' => $request->amount,
                      'purchase_id' => $request->id,
                      'authority' => $result['data']["authority"]
                   ]);
                  
                  if($createPay instanceof Payment){
                    $response = new Response([
                      'authority' => $result['data']["authority"],
                      'location' => 'https://www.zarinpal.com/pg/StartPay/'
                    ]);
  
                    return $response;
                  }           
                }
            } else {
                  $response = new Response([
                    'error' => $result['errors']['code'],
                    'message' => $result['errors']['message']
                  ]);
                  return $response;
            }
        }
    }


    public function pay_verify(Request $request){
        $Authority = $_GET['Authority'];
        $findPay = Payment::whereAuthority($Authority)->first();
        $user = User::whereId($findPay->user_id)->first();
 
        if($user instanceof User){
           
           		foreach($user->purchases as $purchase){
                    if($purchase->id == $findPay->purchase_id){
                        return ['error' => 'existPurchase'];
                    }
                }
              //$findPay->amount
              $data = array("merchant_id" => "06f913c3-12fe-4254-900b-f6b8e533506e" , "authority" => $Authority, "amount" => $findPay->amount); 
              $jsonData = json_encode($data);
              $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/verify.json');
              curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
              curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
              curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                  'Content-Type: application/json',
                  'Content-Length: ' . strlen($jsonData)
              ));

              $result = curl_exec($ch);
           	  $err = curl_error($ch);
              curl_close($ch);
              $result = json_decode($result, true);
 
              if ($err) {
                  echo "cURL Error #:" . $err;
              } else {
                  if(count($result['errors']) != 0){
                    if($result['errors']['code'] == -51){
                        header('Location: https://plugfilm.ir');
                    }
                  }else{
                    if ($result['data']['code'] == 100) {
                            $user->purchases()->attach($findPay->purchase_id);
                            $findPay->ref_id = $result['data']['ref_id'];
                            $findPay->save();
                            header('Location: https://plugfilm.ir/purchase/complete');
                    } else {
                        echo'code: ' . $result['errors']['code'];
                        echo'message: ' .  $result['errors']['message'];
                    }
                  }
              }
           
        }
    }


    public function disable_purchase(Request $request){
        if($request->has('purchaseid')){
            $user = Auth::user();
            if($user instanceof User){
                if($user->purchases()->updateExistingPivot($request->purchaseid , array('deleted_at' => Carbon::now()))){
                    return response()->json(['status' => 'success']);
                }
            }
        }
    }
}
