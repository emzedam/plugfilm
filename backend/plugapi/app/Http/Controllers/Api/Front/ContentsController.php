<?php

namespace App\Http\Controllers\Api\Front;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\Content;
use App\Models\Zhaner;
use App\Models\MediaDetail;
use App\Models\IrMvContent;
use App\Models\AnimationContent;
use App\Models\IrSeriContent;
use App\Models\SpecialContent;
use App\Models\SpecialMediaDetail;
use Illuminate\Support\Arr;

class ContentsController extends Controller
{
    public function get_contents(Request $request){
        $all_content = Content::where('status' , 1)->get();
        if(count($all_content) != 0){
            return response()->json(['content' => $all_content]);
        }
    }

    public function get_special_content(Request $request){
        
        $get_all_content = SpecialContent::all();
        if(count($get_all_content) != 0){
            return response()->json(['specialList' => $get_all_content]);
        }else{
            return response()->json(['specialList' => []]);
        }
        
    }

    public function get_detail_special_content(Request $request){
        if($request->has('id')){
            $SpecialId = $request->id;
            $findById = SpecialContent::find($SpecialId);
            if($findById instanceof SpecialContent){
                return response()->json(['specialDetail' => $findById]);
            }else{
                return response()->json(['specialDetail' => []]);
            }
        }else{
            return response()->json(['specialDetail' => []]);
        }
    }

    public function get_media_special_content(Request $request){
        if($request->has('id')){
            $SpecialId = $request->id;
            $findById = SpecialMediaDetail::where('fkContentId' , $SpecialId)->get();
            if(count($findById) != 0){
                return response()->json(['specialMediaDetail' => $findById]);
            }else{
                return response()->json(['specialMediaDetail' => []]);
            }
        }else{
            return response()->json(['specialMediaDetail' => []]);
        }
    }

    public function get_limited_content(Request $request){
        if($request->has('skip') && $request->has('limit') && $request->has('skipSeries')){
            $skip_series = $request->skipSeries;


            

            // movies
            $countmovies = count(Content::where('status' , 1)->where('contentType', 'movie')
            ->where('ReleaseYear', '>=', 2023)->get());
            $randMovies = rand(0 , $countmovies - 13);
            $movies = Content::where('status' , 1)->where('contentType', 'movie')
                ->where('ReleaseYear', '>=', 2023)
                ->skip($randMovies)->take(12)
                ->get();
            // movies

            // series
            $countseries = count(Content::where('status' , 1)->where('contentType', 'series')
            ->where('ReleaseYear', '>=', 2023)->get());
            $randSeries = rand(0 , $countseries - 13);
            $series = Content::where('status' , 1)->where('contentType', 'series')
                ->where('ReleaseYear', '>=', 2023)
                ->skip($randSeries)->take(12)
                ->get();
            // series


            // newers
            $newers = Content::where('status' , 1)->orderBy('id' , 'desc')
            ->where('ReleaseYear' , '>=' , 2021)
            ->limit(12)
            ->get();
            // newers


            
            // animations
            $animations = AnimationContent::orderBy('ReleaseYear', 'desc')
                ->skip(count(AnimationContent::all())-12)
                ->take(12)
                ->get();
            // animations


            // double ha ---------------- hastan
            $countDouble = count(Content::where('status' , 1)->where('ReleaseYear', '>=', 2021)
            ->where('TranslateType', 'دوبله')->get());
            $randDouble = rand(0 , $countDouble - 13);
            $doubleha = Content::where('status' , 1)->where('ReleaseYear', '>=', 2021)
                ->where('TranslateType', 'دوبله')
                ->skip($randDouble)->take(12)
                ->orderBy('ReleaseYear', 'desc')
                ->get();
            // double ha   



            $allContent = Content::where('status' , 1)->get();
            $fears_container = [];
            foreach ($allContent as $key => $value) {
                foreach ($value->categories as $index => $category) {
                    if($category["title"] == 'ترسناک'){
                        array_push($fears_container , $value);
                    }
                }
            }

            $fears = Arr::random($fears_container , 12);



            $allContent = Content::where('status' , 1)->get();
            $fantezi_container = [];
            foreach ($allContent as $key => $value) {
                foreach ($value->categories as $index => $category) {
                    if($category["title"] == 'فانتزی'){
                        array_push($fantezi_container , $value);
                    }
                }
            }

            $fantezi = Arr::random($fantezi_container , 12);


            


            // imdb contents  ---------------- hastan
            $countImdbs = count(Content::where('status' , 1)->where('ImdbRate', '>=', 7)
            ->get());
        
            $randImdbs = rand(0 , $countImdbs - 13);
            $imdbs = Content::where('status' , 1)->where('ImdbRate', '>=', 7)
                ->skip($randImdbs)->take(12)
                ->orderBy('ReleaseYear', 'desc')
                ->get()->toArray();
            // imdb contents    



            



            $vitrin = [
                "movies" => $movies,
                "series" => $series,
                "newers" => $newers,
                "animations" => $animations,
                "doubleha" => $doubleha,
                "fears" => $fears,
                "imdbs" => $imdbs,
                "fantezi" => $fantezi
            ];
            
            
            // $content = Content::where('ReleaseYear' , '>=' , '2017')->skip($skip)->take($limit)->get();

            // get serials
            $serials = Content::where('status' , 1)->where('contentType' , 'series')->skip($skip_series)->take(12)->get();

            

            // get categories
            $zhaners = Zhaner::all();
            return response()->json(['content' => $vitrin , 'categories' => $zhaners , 'serials' => $serials ]);
        }
        
    }


    public function get_irani_content(Request $request){
        if($request->type == 'movies'){
            if($request->has('skip') && $request->has('limit')){
                $skip = rand(0 , count(IrMvContent::all())-12 );
                $limit = $request->limit;
                $all_content = IrMvContent::skip($skip)->take($limit)->get();
                $all_anim_content = AnimationContent::skip(count(AnimationContent::all())-12)->take($limit)->get();
                return response()->json(['irMovie' => $all_content , 'animations' => $all_anim_content]);
            }
        }else if($request->type == 'series'){
            $all_content = IrSeriContent::orderBy('id' , 'desc')->get();
            return response()->json($all_content);

        }
    }


    public function get_detail_content(Request $request){
        if($request->has('id')){
            $is_special = $request->is_special;
            if($is_special == 'special'){
                $id = $request->id;
                // get serials
                $relateds = SpecialContent::orderBy('id' , 'DESC')->get();
                $findById = SpecialContent::where('id' , $id)->first();
                if($findById instanceof SpecialContent){
                    return response()->json(['detail' => $findById , 'related' => count($relateds) != 0 ? $relateds : null]);
                }
            }

            $id = $request->id;
            // get serials
            $relateds = Content::where('status' , 1)->skip(100)->take(12)->get();
            $findById = Content::where('status' , 1)->where('id' , $id)->first();
            if($findById instanceof Content){
                return response()->json(['detail' => $findById , 'related' => count($relateds) != 0 ? $relateds : null]);
            }
        }else{
            return response()->json(null);
        }
    }


    public function get_details(Request $request , $id){
        $findById = Content::where('status' , 1)->where('id' , $id)->first();
        if($findById instanceof Content){
            return response()->json($findById);
        }
    }


    public function get_media(Request $request){
        $is_special = $request->is_special;
        if($is_special == 'special'){
            $findById = SpecialContent::where('id' , $request->id)->first();
            if($findById instanceof SpecialContent){
                return response()->json($findById->media);
            }
        }
        $findById = Content::where('status' , 1)->where('id' , $request->id)->first();
        if($findById instanceof Content){
            return response()->json($findById->media);
        }
    }


    public function get_movies_with_cat(Request $request){
        if($request->has('type')){
            if($request->type == 'movies'){
                // $randInt = rand(0,1400);
                // $findByType = Content::where('contentType' , 'movie')->skip($randInt)->take(200)->get();
                $findByType = Content::where('status' , 1)->where('contentType' , 'movie')->get();

                $id_container = [];

                foreach ($findByType as $key => $value) {
                    foreach ($value->categories as $index => $category) {
                        if($category["title"] == 'ایرانی'){
                            array_push($id_container , $value->id);
                        }
                    }
                }

                // $content = Content::where('contentType' , 'movie')->whereNotIn('id',$id_container)->skip($randInt)->take(200)->get();

                if(count($findByType) != 0){
                    return response()->json($findByType);
                }
            }else if($request->type == 'serials'){
                // $randInt = rand(0,200);
                // $findByType = Content::where('contentType' , 'series')->skip($randInt)->take(200)->get();
                $findByType = Content::where('status' , 1)->where('contentType' , 'series')->get();
                $id_container = [];

                foreach ($findByType as $key => $value) {
                    foreach ($value->categories as $index => $category) {
                        if($category["title"] == 'ایرانی'){
                            array_push($id_container , $value->id);
                        }
                    }
                }

                // $content = Content::where('contentType' , 'series')->whereNotIn('id',$id_container)->skip($randInt)->take(200)->get();

                if(count($findByType) != 0){
                    return response()->json($findByType);
                }
            }else {
                $findAll = Content::where('status' , 1)->get();
                $id_container = [];
                foreach ($findAll as $key => $value) {
                    foreach ($value->categories as $index => $category) {
                        if($category["title"] == 'ایرانی'){
                            array_push($id_container , $value->id);
                        }
                    }
                }

                $content = Content::whereNotIn('id',$id_container)->get();

                if(!Cache::has('cache_all')){
                    if(count($content) != 0){
                        Cache::put('cache_all' , $content , now()->addMinutes(14400));
                        return response()->json($content);
                    }
                }else{
                    return response()->json(Cache::get('cache_all'));
                }
            }
        }
        
    }

    public function get_category_movies(Request $request){
        if($request->has('skip') && $request->has('limit') && $request->has('cat_name')){
            $skip = $request->skip;
            $limit = $request->limit;
            $cat_name = $request->cat_name;
            // $getContent = Content::all();
            $content = [];

            // $id_container = [];

            // foreach ($getContent as $key => $value) {
            //     foreach ($value->categories as $index => $category) {
            //         if($category["title"] == 'ایرانی'){
            //             array_push($id_container , $value->id);
            //         }
            //     }
            // }

            // $content_without_irani = Content::skip($skip)->take($limit)->whereNotIn('id' , $id_container)->get();
            $content_without_irani = Content::where('status' , 1)->get();

            foreach ($content_without_irani as $key => $value) {
                foreach ($value->categories as $index => $category) {
                    if($category["title"] == $cat_name){
                        array_push($content , $value);
                    }
                }
            }

            return response()->json($content);
        }else{
            return response()->json(null);
        }
    }

    public function get_searchs(Request $request){
        // $all_content = Content::all();

        // $id_container = [];

        // foreach ($all_content as $key => $value) {
        //     foreach ($value->categories as $index => $category) {
        //         if($category["title"] == 'ایرانی'){
        //             array_push($id_container , $value->id);
        //         }
        //     }
        // }

        // $serchs = Content::whereNotIn('id' , $id_container)
        // ->where('FaName', 'like', "%{$request->search}%")
        // ->orWhere('EnName', 'like', "%{$request->search}%")->get();

        $serchs = Content::where('status' , 1)
        ->where('FaName', 'like', "%{$request->search}%")
        ->orWhere('EnName', 'like', "%{$request->search}%")
        ->where('status' , 1)
        ->get();

        if(count($serchs) != 0){
            return response()->json($serchs);
        }else{
            return response()->json(null);
        }
    }
    


    




// -----------------------
    
    public function seveIrMovies(Request $request){
        // return response()->json(count(IrMvContent::all()));
        $saveData = AnimationContent::create($request->all());
        if($saveData instanceof AnimationContent){
            return response()->json(['status' => 'success']);
        }
    }



    public function save_content(Request $request){
        $saveData = Content::create($request->all());
        if($saveData instanceof Content){
            return response()->json(['status' => 'success']);
        }
    }

    public function save_media(Request $request){
        foreach ($request->all() as $key => $value) {
            MediaDetail::create($value);
        }
    }
}




// $url = 'https://ofilm.ir/api/v2/api.jsp?service=contents';
// try{
// 	$response = Http::timeout(450000)->get($url);
//     return response()->json(count($response->collect()->toArray()));
//     foreach ($response->object() as $key => $value) {
//         $urlCat = 'https://ofilm.ir/api/v2/api.jsp?service=content&id='.$value->id;
//         $response_cat = Http::timeout(450000)->get($urlCat);
//         // $value->categories = $response_cat->object()->categories;
//         Content::create($response_cat->collect()->toArray());
//     }

    // return response()->json($response->object());
    // return response()->json([
    //   	'status' => 200,
    //     'content' => 
    // ]);
// }catch(Exception $e){
// 	 return response()->json(['status' => 500]);
// }
