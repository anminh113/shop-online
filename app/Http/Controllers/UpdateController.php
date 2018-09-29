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
 
    class UpdateController extends Controller{
        
        //User

        public static function getUrl($text){
            // $urlAPI = "http://172.16.198.84:3000/".$text;
            $urlAPI = "http://localhost:3000/".$text;
            return $urlAPI;
        }

        // Admin hệ thống


        public function updateAddCategoryAdmin(Request $req){
            //post data json
            $datajson=array("categoryName" => $req->namecategory);
            $jsonData =json_encode($datajson);
            $json_url = PageController::getUrl('categories');
            $ch = curl_init( $json_url );
            $options = array(
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
                CURLOPT_POSTFIELDS => $jsonData
            );
            curl_setopt_array( $ch, $options );
            $result =  curl_exec($ch);
            dd($result);
            exit();
            Log::info($result);
            curl_close($ch);
            //end post json
           return view('admin/page.addcategoryadmin');
       }

 
        

      


    }

?>
