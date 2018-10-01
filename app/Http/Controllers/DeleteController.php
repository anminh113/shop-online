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
    

 
        

      


    }

?>
