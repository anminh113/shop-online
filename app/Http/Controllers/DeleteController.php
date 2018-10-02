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

 
    class DeleteController extends Controller{
        
        //User

        public static function getUrl($text){
            // $urlAPI = "http://172.16.198.84:3000/".$text;
            $urlAPI = "http://localhost:3000/".$text;
            return $urlAPI;
        }
        // Admin hệ thống
        public function deleteAddCategoryAdmin(Request $req){
             //get json danh muc all
             $client1 = new \GuzzleHttp\Client();
             $res = $client1->request('DELETE',PageController::getUrl('categories/'.$req->id.'') );
             $data = json_decode($res->getBody()->getContents(), true);
            
          
            return redirect()->back();       
        }

        public function deleteAddProductTypeAdmin(Request $req){
            //get json danh muc all
            $client1 = new \GuzzleHttp\Client();
            $res = $client1->request('DELETE',PageController::getUrl('producttypes/'.$req->id.'') );
            $data = json_decode($res->getBody()->getContents(), true);
            return redirect()->back();
        }

        public function deleteAddSpecificationAdmin(Request $req){
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
            if(empty($datatitle)){
                // dd($datatitle);
                $res = $client1->request('delete',PageController::getUrl('specificationtypes/'.$data2['specificationType']['specificationTypeId'].'') );
                $data = json_decode($res->getBody()->getContents(), true);
                return redirect()->back();
            }
          
            for($i=0; $i< count($datatitle); $i++){
                $value[]= $datatitle[$i];
            }
          
       
            // dd($value);
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
