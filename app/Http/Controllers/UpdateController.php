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

 
    class UpdateController extends Controller{
        
        //User

        public static function getUrl($text){
            // $urlAPI = "http://172.16.198.84:3000/".$text;
            $urlAPI = "http://localhost:3000/".$text;
            return $urlAPI;
        }

        // Admin hệ thống


        public function updateAddCategoryAdmin(Request $req){
            // post data json
            $datajson=array([
                "propName" => "categoryName",
                "value" => $req->namecategory]
            );
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('categories/'.$req->categoryId.'');
            $ch = curl_init( $json_url );
            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_CUSTOMREQUEST => "PATCH",
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

        public function updateAddProductTypeAdmin(Request $req){
            //post data json
            $datajson=array([
                "propName" => "productTypeName",
                "value" => $req->nameproducttype
                ]);
            // dd($datajson);
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('producttypes/'.$req->productTypeId.'');
            $ch = curl_init( $json_url );
            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_CUSTOMREQUEST => "PATCH",
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

    public function updateAddSpecificationAdmin(Request $req){
        $datatitle = array();
        $client1 = new \GuzzleHttp\Client();  
        $res = $client1->request('GET',PageController::getUrl('specificationtypes/producttype/'.$req->productTypeId.'') );
        $data2 = json_decode($res->getBody()->getContents(), true);
        for ($i=0;  $i < count($data2['specificationType']['specificationTitle']); $i++){
            $data3 = $data2['specificationType']['specificationTitle'][$i];
            if($data2['specificationType']['specificationTitle'][$i]['_id'] != $req->specificationTypeIdTitle){
                $datatitle[] = $data3;
            }
           
        }
        for($i=0; $i< count($datatitle); $i++){
            $value[]= $datatitle[$i];
        }
        $value1 = array(
            "_id" => $req->specificationTypeIdTitle,
            "title" =>$req->namespecificationtype
        );

        array_push($value,$value1);
        $datajson1 =array([
            "propName" => "specificationTitle",
            "value" =>     $value    ]);
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
        return redirect()->back();
    }

 
        

      


    }

?>
