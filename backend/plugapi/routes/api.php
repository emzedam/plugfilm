<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Front\CategoryController;
use App\Http\Controllers\Api\Front\ContentsController;
use App\Http\Controllers\Api\Front\UsersController;
use App\Http\Controllers\Api\Front\PurchaseController;
use App\Http\Controllers\Api\Front\PaymentsController;
use App\Http\Controllers\Api\Front\DargahController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/contents'] , function(){
    Route::get('/get' , [ContentsController::class , 'get_contents']);
    Route::post('/get_limit' , [ContentsController::class , 'get_limited_content']);
    Route::post('/get_irani' , [ContentsController::class , 'get_irani_content']);
    Route::post('/vcasvcd' , [ContentsController::class , 'get_detail_content']);
    Route::get('/get/{id}' , [ContentsController::class , 'get_details']);
    Route::post('/get/media' , [ContentsController::class , 'get_media']);
    Route::post('/get/movie_types' , [ContentsController::class , 'get_movies_with_cat']);
    Route::post('/get/category/movies' , [ContentsController::class , 'get_category_movies']);
    Route::post('/search' , [ContentsController::class , 'get_searchs']);


    Route::post('/set_irani' , [ContentsController::class , 'seveIrMovies']);
    Route::post('/store' , [ContentsController::class , 'save_content']);
    Route::post('/media/store' , [ContentsController::class , 'save_media']);

    Route::get('/get-special-content' , [ContentsController::class , 'get_special_content']);
    Route::post('/get-detail-special-content' , [ContentsController::class , 'get_detail_special_content']);
    Route::post('/get-media-special-content' , [ContentsController::class , 'get_media_special_content']);
});

Route::group(['prefix' => '/category'] , function(){
    Route::get('/get' , [CategoryController::class , 'getCats']);
});

Route::group(['prefix' => '/users'] , function(){
    Route::post('/set_white' , [UsersController::class , 'set_user_white']);
    Route::post('/sendCode' , [UsersController::class , 'send_code']);
    Route::post('/wellcomeMessage' , [UsersController::class , 'send_wellcome_message']);
    Route::post('/codeValid' , [UsersController::class , 'code_valid']);
    Route::post('/register' , [UsersController::class , 'user_register']);
    Route::post('/login' , [UsersController::class , 'user_login']);
    Route::post('/logout' , [UsersController::class , 'logout']);
    Route::post('/checkExist' , [UsersController::class , 'check_exist']);
    Route::post('/me' , [UsersController::class , 'me']);
    Route::post('/add_fav' , [UsersController::class , 'add_fav']);
    Route::post('/get_fav' , [UsersController::class , 'get_favorites']);
});


Route::group(['prefix' => '/purchase'] , function(){
    Route::post('/get' , [PurchaseController::class , 'get_purchases']);
});

Route::group(['prefix' => '/payments'] , function(){
    Route::post('/connect' , [PaymentsController::class , 'save_order']);
    Route::get('/pay_verify' , [PaymentsController::class , 'pay_verify']);
    Route::post('/disable_purchase' , [PaymentsController::class , 'disable_purchase']);
});

Route::group(['prefix' => '/dargah'] , function(){
    Route::get('/connect' , [DargahController::class , 'request']);
    Route::get('/verify_connect' , [DargahController::class , 'verify']);
});


