<?php
    namespace App\Http\Controllers;
    use View, Input, Redirect;
    use App\Cart;
    use Session;
    use Illuminate\Http\Request;
    use GuzzleHttp\Client;
    use GuzzleHttp\Promise;
    use GuzzleHttp\Pool;
    use Illuminate\Support\Facades\Log;
    use GuzzleHttp\Exception\RequestException;

 
    class PostController extends Controller{
        
        //User

        public static function getUrl($text){
            // $urlAPI = "http://172.16.198.84:3000/".$text;
            $urlAPI = "http://localhost:3000/".$text;
            return $urlAPI;
        }

 
        public function postAddCategoryAdmin(Request $req){
             //post data json
             $datajson=array("categoryName" => $req->namecategory);
             $jsonData =json_encode($datajson);
             $json_url = PageController::getUrl('categories');
             $ch = curl_init( $json_url );
             $options = array(
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                 CURLOPT_CUSTOMREQUEST => "POST",
                 CURLOPT_POSTFIELDS => $jsonData
             );
             curl_setopt_array( $ch, $options );
             $result =  curl_exec($ch);
            //  dd($result);
            //  exit();
             Log::info($result);
             curl_close($ch);
             //end post json
             return redirect()->back();
        }

        public function postAddProductTypeAdmin(Request $req){
            //post data json
            $datajson=array(
                "productTypeName" => $req->nameproducttype,
                "categoryId" => $req->categoryId
                );
            // dd($datajson);
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('producttypes');
            $ch = curl_init( $json_url );
            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $jsonData
            );
            curl_setopt_array( $ch, $options );
            $result =  curl_exec($ch);
            // dd($result);
            // exit();
           
            Log::info($result);
            curl_close($ch);
            //end post json
            return redirect()->back();
       }

        public function postAddSpecificationAdmin(Request $req){
            
            //post data json
            $datajson=array(
                "productTypeId" => $req->productTypeId,
                "specificationTitle" => [
                    "title" =>$req->namespeecification
                    ]
                );
            // dd($datajson);
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('specificationtypes');
            $ch = curl_init( $json_url );
            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $jsonData
            );
            curl_setopt_array( $ch, $options );
            $result =  curl_exec($ch);
            $data = json_decode($result, true);
        
            if($data['message'] == "Specification type of product type is already" ){
                $datatitle = array();
                $client1 = new \GuzzleHttp\Client();  
                $res = $client1->request('GET',PageController::getUrl('specificationtypes/producttype/'.$req->productTypeId.'') );
                $data2 = json_decode($res->getBody()->getContents(), true);
                // dd($data2['specificationType']['specificationTitle'][0]['title']);

            
                for ($i=0;  $i < count($data2['specificationType']['specificationTitle']); $i++){
                    $data3 = $data2['specificationType']['specificationTitle'][$i]['title'];
                    $datatitle[] = $data3;
                }
                for($i=0; $i< count($datatitle); $i++){
                    $title[] =$datatitle[$i] ;
                 }
              
                array_push($title,$req->namespeecification);
                // $value = "";
                for($i=0; $i< count($datatitle); $i++){
                    $value[]= ([
                        "title" => $title[$i],
                        ]);
                 }
                 $value1 =(["title" => $req->namespeecification]);
                 array_push($value,$value1);
                // dd($value);
                //post data json
                $datajson1 =array([
                    "propName" => "specificationTitle",
                    "value" => 
                    
                          $value
                       

                        // ["title" =>$req->namespeecification]]
                        // ["title" =>$req->namespeecification]
                        
                            
                    ]);
                // dd($datajson1);
                $jsonData1 =json_encode($datajson1);
                $json_url1 = PageController::getUrl('specificationtypes/'.$data2['specificationType']['specificationTypeId'].'');
                $ch1 = curl_init( $json_url1 );
                $options1 = array(
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                    CURLOPT_CUSTOMREQUEST => "PATCH",
                    CURLOPT_POSTFIELDS => $jsonData1
                );
                curl_setopt_array( $ch1, $options1 );
                $result1 =  curl_exec($ch1);
                // dd($result1);

            }
                
                return redirect()->back();
        }

      


    }

?>
