<?php

namespace App\Http\Controllers\Api\Front;

use App\Models\User;
use App\Models\Favorite;
use App\Models\Content;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use App\Helpers\Subnet\SubnetCalculator;
use App\Models\WhiteList;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['user_login', 'check_exist' , 'user_register', 'logout', 'send_code', 'code_valid' , 'set_user_white']]);
    }

    public function send_code(Request $request)
    {
        if ($request->has('phone')) {
            $phoneNumber = $request->phone;
            $randOtp = rand(1000, 9999);
            ini_set("soap.wsdl_cache_enabled", "0");
            try {
                $client = new \SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
                $user = "9142766601";
                $pass = "mh36463646";
                $fromNum = "+983000505";
                $toNum = array($phoneNumber);
                $pattern_code = "kgol05gp96oe4wk";
                $input_data = array("token" => $randOtp);
                if($client->sendPatternSms($fromNum,$toNum,$user,$pass,$pattern_code,$input_data)){
                    return new Response([
                        'status' => 200,
                        'phone'  => $phoneNumber,
                        'd_'     => Hash::make('1' . $randOtp . '6')
                    ]);
                }
            } catch(SoapFault $ex){
                return response()->json(['err' => 'error']);
            }
        }
    }


    public function set_user_white(){ 
        $ip = trim(request()->userip); // just to be safe
  
        //ip2long($ip)
        $white_lists = WhiteList::all();
        $resultArray = [];	
        foreach($white_lists as $whiteList){
          if(strpos($whiteList->ip, "/") !== false){
              $explode_ip = explode('/' , $whiteList->ip);
              $sub = new SubnetCalculator($explode_ip[0], $explode_ip[1]);
              $rangeIps = $sub->getIPAddressRange();
          }else{
              $rangeIps = explode('-' , $whiteList->ip);
          }
          
          $low = ip2long($rangeIps[0]);
          $high = ip2long($rangeIps[1]);
          $range_ip = ip2long($ip);
          
          if ($range_ip <= $high && $low <= $range_ip) {
             array_push($resultArray , "success");
          }else{
             array_push($resultArray , "error");
          }
        }
        
        if(in_array( "success" , $resultArray)){
          return response()->json(["status" => "success"]);
        }else{
            return response()->json(["status" => "error"]);
        }
    }


    public function send_wellcome_message(Request $request){
        $user = Auth::user();
        if($user instanceof User){
            $phoneNumber = $user->phone;
            ini_set("soap.wsdl_cache_enabled", "0");
            try {
                $client = new \SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
                $user = "9142766601";
                $pass = "mh36463646";
                $fromNum = "+983000505";
                $toNum = array($phoneNumber);
                $pattern_code = "vn4te2r8wkhk63y";
                $input_data = array("name" => $phoneNumber);
                if($client->sendPatternSms($fromNum,$toNum,$user,$pass,$pattern_code,$input_data)){
                    $response = new Response([
                    'status' => 200,
                    'message'  => 'success'
                    ]);
                    return $response;
                }
            } catch (SoapFault $ex) {
                return response()->json(['err' => 'error']);
            }   
            return response()->json([
                'action' => 'faild'
            ]);
        }
    }

    public function code_valid(Request $request)
    {
        if ($request->code) {
            $code = '1' . $request->code . '6';
            if (!$request->has('_d') || $request->_d == '') {
                return response()->json([
                    'status'     => 200,
                    'expireCode' => true
                ]);
            }

            if (!$this->hashCheck($code, $request->_d)) {
                return response()->json([
                    'notValid'     => 'متاسفانه کد وارد شده صحیح نمیباشد'
                ]);
            }

            return [
                'status' => 200,
                'response' => 'success'
            ];
        }
    }


    public function hashCheck($value , $hasedVal){
        if(Hash::check($value , $hasedVal)){
          return true;
        }else{
            return false;
        }
    }


    public function user_register(Request $request)
    {
        $registerValidate = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'code' => 'required'
        ]);

        if ($registerValidate->fails()) {
            return response()->json([
                'errors' => $registerValidate->errors()
            ]);
        }

        $user = User::where('phone', '=', $request->phone)->first();
        if ($user instanceof User) {
            $token = JWTAuth::fromUser($user);
            if ($token) {
                $user->code = '1' . $request->code . '6';
                $user->token = $token;
                $user->name = $request->name;
                $user->save();
                $response = new Response([
                    'response' => 'success',
                    'access_token' => $token,
                ]);
                return $response;
            }
        } else {
            $registered = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'code'   => '1' . $request->code . '6',
                // 'email' => $request->email,
                'password' => Hash::make('1234')
            ]);
            if ($registered instanceof User) {
                $authUser = User::where('phone', '=', $request->phone)->first();
                $token = JWTAuth::fromUser($authUser);
                if ($token) {
                    $authUser->token = $token;
                    $authUser->save();
                    $response = new Response([
                        'response' => 'success',
                        'access_token' => $token,
                    ]);
                    return $response;
                }
            }
        }
    }

    public function user_login(Request $request)
    {
        $registerValidate = Validator::make($request->all(), [
            'phone' => 'required',
            'code'  => 'required'
        ]);

        if ($registerValidate->fails()) {
            return response()->json([
                'errors' => $registerValidate->errors()
            ]);
        }

        $user = User::where('phone', '=', $request->phone)->first();
         if ($user instanceof User) {
            	$token = JWTAuth::fromUser($user);
     
            if ($token) {
                $user->code = '1' . $request->code . '6';
                $user->token = $token;
                $user->save();
                $response = new Response([
                    'response' => 'success',
                    'access_token' => $token,
                ]);
                return $response;
            }
        } 

        return response()->json([
            'status' => 0,
            'message' => 'notFound'
        ]);
       
    }


    public function check_exist(Request $request){
        $checkValidate = Validator::make($request->all() , [
            'phone' => 'required'
        ]);
        if ($checkValidate->fails()) {
            return response()->json([
                'errors' => $checkValidate->errors()
            ]);
        }

        $user = User::where('phone', '=', $request->phone)->first();
        if ($user instanceof User) {
            return response()->json([
                'allow' => true
            ]);
        }
         return response()->json([
            'allow' => false
         ]);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }


    public function logout()
    {
        auth()->logout();
        $response = new Response(['message' => 'Successfully logged out']);
        return $response;
    }


    public function add_fav(Request $request){
        if(Auth::user() instanceof User){
            if($request->id){
                $find = Favorite::where('movie_id' , $request->id)->where('user_id' , Auth::user()->id)->first();
                if(!$find instanceof Favorite){
                    $add = Favorite::create([
                        'movie_id' => $request->id,
                        'user_id' =>  Auth::user()->id
                    ]);
                    if($add instanceof Favorite){
                        return response()->json([
                            'status' => 200,
                            'message' => 'success'
                        ]);
                    }
                }else{
                    return response()->json([
                        'status' => 'err',
                        'message' => 'exist'
                    ]);
                }
            } 
        }
    }


    public function get_favorites(Request $request){
        if(Auth::user() instanceof User){
            $getIds = Favorite::where('user_id' , '=' , Auth::user()->id)->get('movie_id');
            return response()->json(Content::whereIn('id' , $getIds)->get());
        }else{
            return response()->json(null);
        }
    }
}
