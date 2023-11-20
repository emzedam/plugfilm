<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Content;
use App\Models\MediaDetail;
use App\Models\AnimationContent;


class UpdateContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:content';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'for update content shadfilm';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $old_content = Content::orderBy('id' , 'desc')->pluck('id')->toArray();

        $new_content = Http::get('http://193.3.182.21/api/v2/plugfilm.jsp?service=contents');
  
        $new_content_array = collect($new_content->json())->pluck('id')->toArray();

        $diffContents = array_diff($new_content_array , $old_content);
        
    //     $hiddenIds = ['795','1343','776','1246','1271','1275','1373','994','1353','1371','1369','1245','1360','1280','1357','1356','1359','790','1354','1288','1293','1381' , '1405','1404',
    //    '1403','1402','1401','1407','1406','1410','1408','1393','1392','1375','1374','1399','1398','1397','1396','1395','1394' , '1380' , '1379' , '1341' , '1376' , '1370' , '1372' , '1358' , '1355',
    //    '1361' , '1244' , '783' , '1409' , '1364' , '1446' , '1451','1450','1449','1448','1447','1460','1506','1507','1504','1505','707',
    //    '1495','1494','1491','1493','1485'];

    //     foreach ($hiddenIds as $value) {
    //         $findThis = Content::findOrFail($value);
    //         if($findThis instanceof Content){
    //             $findThis->status = 0;
    //             $findThis->save();
    //         }
    //     }


        if(count($diffContents) != 0){
            foreach($diffContents as $diffContent){
                $content = Http::get('http://193.3.182.21/api/v2/plugfilm.jsp?service=content&id='.$diffContent);

                if ($content->json() != null) {

                    foreach($content->json()["categories"] as $category){
                        if($category["title"] == 'انیمیشن'){
                            $saveData = AnimationContent::create([
                                "id" => $content->json()["id"],
                                "FaStoryline" => $content->json()["FaStoryline"],
                                "EnName" => $content->json()["EnName"],
                                "Countries" => $content->json()["Countries"],
                                "Stars" => $content->json()["Stars"],
                                "ReleaseYear" => $content->json()["ReleaseYear"],
                                "FaName" => $content->json()["FaName"],
                                "Image" => $content->json()["Image"],
                                "ImdbRateCount" => $content->json()["ImdbRateCount"],
                                "ImdbRate" => $content->json()["ImdbRate"],
                                "Directores" => $content->json()["Directores"],
                                "Cover" => $content->json()["Cover"],
                                "AgeLimit" => $content->json()["AgeLimit"],
                                "provider" => $content->json()["provider"],
                                "TranslateType" => $content->json()["TranslateType"],
                                "originalId" => $content->json()["originalId"],
                                "categories" => $content->json()["categories"],
                                "ImdbID" => $content->json()["ImdbID"],
                                "contentType" => $content->json()["contentType"],
                            ]);
                        }
                    }

                    $saveData = Content::create([
                        "id" => $content->json()["id"],
                        "FaStoryline" => $content->json()["FaStoryline"],
                        "EnName" => $content->json()["EnName"],
                        "Countries" => $content->json()["Countries"],
                        "Stars" => $content->json()["Stars"],
                        "ReleaseYear" => $content->json()["ReleaseYear"],
                        "FaName" => $content->json()["FaName"],
                        "Image" => $content->json()["Image"],
                        "ImdbRateCount" => $content->json()["ImdbRateCount"],
                        "ImdbRate" => $content->json()["ImdbRate"],
                        "Directores" => $content->json()["Directores"],
                        "Cover" => $content->json()["Cover"],
                        "AgeLimit" => $content->json()["AgeLimit"],
                        "provider" => $content->json()["provider"],
                        "TranslateType" => $content->json()["TranslateType"],
                        "originalId" => $content->json()["originalId"],
                        "categories" => $content->json()["categories"],
                        "ImdbID" => $content->json()["ImdbID"],
                        "contentType" => $content->json()["contentType"],
                    ]);
                    if($saveData instanceof Content){
                        $media_content = Http::get('http://193.3.182.21/api/v2/plugfilm.jsp?service=contentMedia&id='.$diffContent);
                        if($media_content->json() != null){
                            foreach ($media_content->json() as $key => $value) {
                                MediaDetail::create([
                                    "id" => $value["id"], 
                                    "mediaUrl" => $value["mediaUrl"], 
                                    "costMessage" => $value["costMessage"],
                                    "episode" => $value["episode"],
                                    "title" => $value["title"],
                                    "finalHlsUrl" => $value["finalHlsUrl"],
                                    "fkContentId" => $value["fkContentId"],
                                    "duration" => $value["duration"],
                                    "mediaUrl2" => $value["mediaUrl2"],
                                    "mediaUrl1" => $value["mediaUrl1"],
                                    "finalMp4Url" => $value["finalMp4Url"],
                                    "subFaUrl" => $value["subFaUrl"],
                                    "seasonName" => $value["seasonName"],
                                    "subVttUrl" => $value["subVttUrl"],
                                    "thumbUrl" => $value["thumbUrl"],
                                    "mediaUrl4" => $value["mediaUrl4"],
                                    "subEnUrl" => $value["subEnUrl"],
                                    "mediaUrl3" => $value["mediaUrl3"],
                                    "mediaUrl5" => $value["mediaUrl5"],
                                    "m3u8Url" => $value["m3u8Url"],
                                    "finalSubUrl" => $value["finalSubUrl"]
                                ]);
                            }
                        }
                        
                    }

                }
                
            }
        }
    }
}
